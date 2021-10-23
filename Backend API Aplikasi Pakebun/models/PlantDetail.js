const mongoose = require('mongoose')
const Schema = mongoose.Schema

const plantDetailSchema = new Schema({
    plant: {
        type: Schema.ObjectId, ref: 'Plant'
    },
    name: {
        type: String
    },
    familia: {
        type: String
    },
    genus: {
        type: String
    },
    harvest_estimate: {
        type: String
    },
    temperature: {
        type: String
    },
    humidity: {
        type: String
    },
    soil_humidity: {
        type: String
    },
    soil_nutrition: {
        type: String
    },
    light_needed: {
        type: String
    },
    ph: {
        type: String
    },
    description: {
        type: String
    }
}, {timestamps: true})

const PlantDetail = mongoose.model('PlantDetail', plantDetailSchema)
module.exports = PlantDetail