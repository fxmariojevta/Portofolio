const mongoose = require('mongoose')
const Schema = mongoose.Schema

const gardenSchema = new Schema({
    image: {
        type: String
    },
    title: {
        type: String
    },
    location: {
        type: String
    }
}, {timestamps: true})

const Garden = mongoose.model('Garden', gardenSchema)
module.exports = Garden