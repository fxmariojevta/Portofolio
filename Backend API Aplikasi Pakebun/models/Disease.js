const mongoose = require('mongoose')
const Schema = mongoose.Schema

const diseaseSchema = new Schema({
    plant: {
        type: Schema.ObjectId, ref: 'Plant'
    },
    image: {
        type: String
    },
    title: {
        type: String
    },
    description: {
        type: String
    },
    solution: {
        type: String
    }
}, {timestamps: true})

const Disease = mongoose.model('Disease', diseaseSchema)
module.exports = Disease