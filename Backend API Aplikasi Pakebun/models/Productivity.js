const mongoose = require('mongoose')
const Schema = mongoose.Schema

const productivitySchema = new Schema({
    plant: {
        type: Schema.ObjectId, ref: 'Plant'
    },
    constant: {
        type: Number
    }
}, {timestamps: true})

const Productivity = mongoose.model('Productivity', productivitySchema)
module.exports = Productivity