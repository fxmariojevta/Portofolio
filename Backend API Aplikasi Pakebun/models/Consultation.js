const mongoose = require('mongoose')
const Schema = mongoose.Schema

const consultationSchema = new Schema({
    symptom: [{ type : Schema.ObjectId, ref: 'Symptom' }],
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
    },
    percentage: {
        type: String
    }
}, {timestamps: true})

const Consultation = mongoose.model('Consultation', consultationSchema)
module.exports = Consultation