const mongoose = require('mongoose')
const Schema = mongoose.Schema

const plantSchema = new Schema({
    image: {
        type: String
    },
    name: {
        type: String
    },
    title: {
        type: String
    }
}, {timestamps: true})

const Plant = mongoose.model('Plant', plantSchema)
module.exports = Plant