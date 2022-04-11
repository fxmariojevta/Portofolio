const mongoose = require('mongoose')
const Schema = mongoose.Schema

const farmingStepSchema = new Schema({
    title: {
        type: String
    },
    step_detail: [{
        image: String,
        step: String,
        description: String
    }]
}, {timestamps: true})

const FarmingStep = mongoose.model('FarmingStep', farmingStepSchema)
module.exports = FarmingStep