const express = require('express');
const app = express();
const mongoose = require('mongoose');
const morgan = require('morgan');
const bodyParser = require('body-parser');

const UserRoute = require('./routes/user')
const AuthRoute = require('./routes/auth')
const PlantRoute = require('./routes/plant')
const ArticleRoute = require('./routes/article')
const ToolsRoute = require('./routes/tools')
const GardenRoute = require('./routes/garden')

// mongoose.connect('mongodb://localhost:27017/testdb', {useNewUrlParser: true, useUnifiedTopology: true})

const username = "root";
const password = "pakebun";
const cluster = "cluster0.vrola";
const dbname = "pakebundb";

mongoose.connect(
  `mongodb+srv://${username}:${password}@${cluster}.mongodb.net/${dbname}?retryWrites=true&w=majority`, 
  {
    useNewUrlParser: true,
    useUnifiedTopology: true
  }
).then(() => console.log('MongoDB connected...'))
.catch(err => console.log(err));

const db = mongoose.connection

db.on('error', (err) => {
    console.log(err)
})

db.once('open', () => {
    console.log('Database Connection Established!')
})

app.use(morgan('dev'))
app.use(bodyParser.urlencoded({extended: true}))
app.use(bodyParser.json())

const PORT = process.env.PORT || 3000

app.listen(PORT, () => {
    console.log(`Server is running on port ${PORT}`)
})

app.use('/api/user', UserRoute)
app.use('/api/adm', AuthRoute)
app.use('/api/plant', PlantRoute)
app.use('/api/article', ArticleRoute)
app.use('/api/tools', ToolsRoute)
app.use('/api/garden', GardenRoute)