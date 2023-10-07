import express from 'express'

import cors from 'cors'

import ptecnicaRoutes from './routes/ptecnica.routes.js'

const app = express()

app.use(express.json())

app.use(cors({
  methods: ['GET']
}));

app.get('/', (req,res) => {
    res.send('Prueba Tecnica - Api en Node.js');
});

app.use(ptecnicaRoutes)

app.use((err, req, res, next) => {
  console.error(err.stack)
  res.status(500).send('Something broke 💩')
})

app.listen(3000, () => {
  console.log('Server is running on port 3000')
})