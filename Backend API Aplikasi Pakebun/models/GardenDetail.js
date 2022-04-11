const mongoose = require('mongoose')
const Schema = mongoose.Schema

const gardenDetailSchema = new Schema({
    garden: {
        type: Schema.ObjectId, ref: 'Garden'
    },
    image: {
        type: String
    },
    status: {
        type: String
    },
    name: {
        type: String
    },
    location: {
        type: String
    },
    zone: [{
        title: String,
        plant: String,
        harvest_time: String,
        soil: {
            temperature: String,
            water_content: String,
            nutrition: String,
            light: String
        },
        environment: {
            temperature: String,
            humidity: String,
            air_pressure: String
        }
    }]
}, {timestamps: true})

const GardenDetail = mongoose.model('GardenDetail', gardenDetailSchema)
module.exports = GardenDetail