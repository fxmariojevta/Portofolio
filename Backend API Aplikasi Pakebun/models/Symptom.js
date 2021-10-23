const mongoose = require('mongoose')
const Schema = mongoose.Schema

const symptomSchema = new Schema({
    plant: {
        type: Schema.ObjectId, ref: 'Plant'
    },
    image: {
        type: String
    },
    title: {
        type: String
    }
}, {timestamps: true})

const Symptom = mongoose.model('Symptom', symptomSchema)
module.exports = Symptom