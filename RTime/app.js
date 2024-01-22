const express = require('express');
const bodyParser = require('body-parser');
const { db, pgp } = require('./database'); // Asegúrate de configurar correctamente la ruta a tu archivo de configuración de la base de datos

const app = express();
const port = 3000;

// Configura body-parser
app.use(bodyParser.json());

// Configura la conexión a la base de datos
const dbConfig = {
  host: 'postgresaql', // Cambia a la dirección de tu base de datos
  port: 5432, // Cambia al puerto de tu base de datos
  database: 'trivia_bd', // Nombre de la base de datos
  user: 'tu_usuario', // Cambia al nombre de usuario de tu base de datos
  password: 'admin', // Cambia a la contraseña de tu base de datos
};

const pgPromise = require('pg-promise');
const pgp = pgPromise();
const db = pgp(dbConfig);

// Define la ruta para registrar un usuario
app.post('/registrar_usuario', (req, res) => {
  const { nombre, usuario, contrasena } = req.body;

  db.none('INSERT INTO usuarios (nombre, usuario, contrasena) VALUES ($1, $2, $3)', [nombre, usuario, contrasena])
    .then(() => {
      res.json({ success: true });
    })
    .catch(error => {
      console.error('Error en la base de datos:', error);
      res.json({ success: false });
    });
});

// Inicia el servidor
app.listen(port, () => {
  console.log(`Servidor en http://localhost:${port}`);
});
