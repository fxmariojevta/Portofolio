const Plant = require('../models/Plant')
const Fertilizer = require('../models/Fertilizer')

const index = (req, res, next) => {
    Plant.find({}, { _id: 1, image: 1, name: 1, title: 1 } )
    .then(plant => {
        res.json({
            response: 'succeed',
            message: 'Get Data Succeed',
            value: {
                cmd: 'Plant List',
                data: plant
            }
        })
    })
    .catch(error => {
        res.json({
            message: 'An error Occured'
        })
    })
}

const calculate = (req, res, next) => {
    Fertilizer.find({plant: req.body._id}, { 
        title: 1, 
        dose: 1, 
        detail: 1} )
    .then(fertilizer => {
        res.json({
            response: 'succeed',
            message: 'Get Data Succeed',
            value: {
                cmd: 'Calculate Fertilizer',
                data: fertilizer
            }
        })
    })
    .catch(error => {
        res.json({
            message: 'An error Occured'
        })
    })
}

const indexFertilizer = (req, res, next) => {
    Fertilizer.find()
    .then(response => {
        res.json({
            response
        })
    })
    .catch(error => {
        res.json({
            message: 'An error Occured'
        })
    })
}

const showFertilizer = (req, res, next) => {
    Fertilizer.findById(req.body._id)
    .then(response => {
        res.json({
            response
        })
    })
    .catch(error => {
        res.json({
            message: 'An error Occured!'
        })
    })
}

const storeFertilizer = (req, res, next) => {
    let fertilizer = new Fertilizer({
        plant: req.body.plant,
        title: req.body.title,
        dose: [{
            fertilizer: req.body.dose_fertilizer,
            amount: req.body.dose_amount
        }],
        detail: {
            weeks: req.body.weeks,
            fertilizer: req.body.fertilizer,
            amount: req.body.amount
        }
    })
    fertilizer.save()
    .then(response => {
        res.json({
            message: 'Fertilizer Added Successfully!'
        })
    })
    .catch(error => {
        res.json({
            message: 'An error Ocuured!'
        })
    })
}

const updateFertilizer = (req, res, next) => {
    let _id = req.body._id
    let updatedData = {
        plant: req.body.plant,
        title: req.body.title,
        dose: [{
            fertilizer: req.body.fertilizer,
            amount: req.body.amount
        }],
        detail: {
            weeks: req.body.weeks,
            fertilizer: req.body.fertilizer,
            amount: req.body.amount
        }
    }
    Fertilizer.findByIdAndUpdate(_id, {$set: updatedData})
    .then(() => {
        res.json(
                { message: 'Fertilizer updated successfully' }
        )
    })
    .catch(error => {
        res.json({
            message: 'An error Ocuured!'
        })
    })
}

const destroyFertilizer = (req, res, next) => {
    let _id = req.body._id
    Fertilizer.findByIdAndRemove(_id)
    .then(() => {
        res.json({
            message: 'Fertilizer deleted successfully!'
        })
    })
    .catch(error => {
        res.json({
            message: 'An error Occured!'
        })
    })
}

module.exports = {
    index, calculate, indexFertilizer, showFertilizer, storeFertilizer, updateFertilizer, destroyFertilizer
}