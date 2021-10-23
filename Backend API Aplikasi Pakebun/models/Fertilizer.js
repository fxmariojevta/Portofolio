const mongoose = require('mongoose')
const Schema = mongoose.Schema

const fertilizerSchema = new Schema({
    plant: {
        type: Schema.ObjectId, ref: 'Plant'
    },
    title: {
        type: String
    },
    dose: [{
        fertilizer: String,
        amount: String
    }],
    detail: {
        weeks: String,
        fertilizer: String,
        amount: String
    }
}, {timestamps: true})

const Fertilizer = mongoose.model('Fertilizer', fertilizerSchema)
module.exports = Fertilizer