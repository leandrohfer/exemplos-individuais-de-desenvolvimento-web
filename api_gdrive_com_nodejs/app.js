// *** MÓDULO EXTERNO
const {
  google
} = require("googleapis");
const express = require("express");
const multer = require("multer");

// *** INICIALIZAÇÃO DO EXPRESS
const app = express();

// *** CORE MODULES
const path = require("path");
const fs = require("fs");

// *** DADOS DE ACESSO DE OUTRO ARQUIVO JS
const {
  ACESS
} = require("./config.js");

/**
 * *** DADOS DE ACESSO NECESSÁRIOS
 *
 * CLIENT_ID E CLIENT_SECRET SÃO, RESPECTIVAMENTE O SEU ID DO CLIENTE E
 * ID SECRETO DO CLIENTE, DISPONÍVEIS NA TELA DE CREDENCIAS DO GOOGLE
 * CLOUD PLATAFORM.
 *
 * REDIRECT_URI CORRESPONDE AO SEGUINTE LINK:
 * https://developers.google.com/oauthplayground
 *
 * NO LINK ACIMA VOCÊ PRECISA AUTORIZAR A API DO GOOGLE DRIVE COM O
 * CLIENT ID E COM O CLIENT SECRET, AO FINALIZAR, SERÁ EXIBIDO O
 * SEU TOKEN DE ATUALIZAÇÃO (REFRESH_TOKEN)
 */

// *** AUTENTICAÇÃO COM OS DADOS DE ACESSO NO OAUTH2 DO GOOGLE
const oauth2Client = new google.auth.OAuth2(
  ACESS.CLIENT_ID,
  ACESS.CLIENT_SECRET,
  ACESS.REDIRECT_URI
);

// *** AUTENTICAÇÃO NO SERVIDOR DE AUTORIZAÇÃO DO GOOGLE
oauth2Client.setCredentials({
  refresh_token: ACESS.REFRESH_TOKEN
});

const drive = google.drive({
  version: "v3",
  auth: oauth2Client,
});


async function uploadFile(nameFileOrigin, nameFileNew) {
  try {
    const filePath = path.join(__dirname, nameFileOrigin);

    const response = await drive.files.create({
      requestBody: {
        name: nameFileNew + path.extname(nameFileOrigin),
        mimeType: "application/pdf",
      },
      media: {
        mimeType: "application/pdf",
        body: fs.createReadStream(filePath),
      },
    });

    console.log(response.data);
    console.log(response.data.id);
  } catch (error) {
    console.log(error.message);
  }
}
// uploadFile();

async function deleteFile() {
  try {
    const response = await drive.files.delete({
      fileId: "YOUR_FILE_ID",
    });
    console.log(response.data, response.status);
  } catch (error) {
    console.log(error.message);
  }
}
// deleteFile();

async function generatePublicUrl() {
  try {
    const fileId = "YOUR_FILE_ID";
    await drive.permissions.create({
      fileId: fileId,
      requestBody: {
        role: "reader",
        type: "anyone",
      },
    });

    /*
      webViewLink: View the file in browser
      webContentLink: Direct download link
      */
    const result = await drive.files.get({
      fileId: fileId,
      fields: "webViewLink, webContentLink",
    });
    console.log(result.data);
  } catch (error) {
    console.log(error.message);
  }
}
// generatePublicUrl();

async function searchFile() {
  const files = [];
  try {
    const res = await drive.files.list({
      q: "mimeType='application/pdf'",
      fields: "nextPageToken, files(id, name)",
      spaces: "drive",
    });
    Array.prototype.push.apply(files, res.files);
    res.data.files.forEach(function (file) {
      console.log("Found file:", file.name, file.id);
    });
    return res.data.files;
  } catch (err) {
    // TODO(developer) - Handle error
    throw err;
  }
}
searchFile();

const storage = multer.diskStorage({
  destination: function (req, file, callback) {
    callback(null, "uploads/");
  },
  filename: function (req, file, callback) {
    callback(null, file.originalname);
  }
})

const upload = multer({
  storage
});

app.use(
  express.urlencoded({
    extended: true,
  })
);

app.use(express.json());

app.set("view engine", "ejs");

app.get("/", (req, res) => {
  res.render("index");
});

app.post("/upload", upload.single("file"), (req, res) => {
  res.send("Arquivo recebido! " + req.body.nome);
  console.log(req.body);
});

app.listen(8080, () => {
  console.log("Servidor rodando!");
});