const Plant = require('../models/Plant')
const Productivity = require('../models/Productivity')

const index = (req, res, next) => {
    Plant.find({}, { _id: 1, image: 1, name: 1, title: 1 })
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

const productivity = (req, res, next) => {
    Productivity.find({plant: req.body._id}, { constant: 1 } )
    .then(productivity => {
        res.json({
            response: 'succeed',
            message: 'Get Data Succeed',
            value: {
                cmd: 'Calculate Productivity',
                data: productivity
            }
        })
    })
    .catch(error => {
        res.json({
            message: 'An error Occured'
        })
    })
}

const indexProductivity = (req, res, next) => {
    Productivity.find()
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

const show = (req, res, next) => {
    Productivity.findById(req.body._id)
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

const store = (req, res, next) => {
    let productivity = new Productivity({
        plant: req.body.plant,
        constant: req.body.constant
    })
    productivity.save()
    .then(response => {
        res.json({
            message: 'Productivity Added Successfully!'
        })
    })
    .catch(error => {
        res.json({
            message: 'An error Ocuured!'
        })
    })
}

const update = (req, res, next) => {
    let _id = req.body._id
    let updatedData = {
        plant: req.body.plant,
        constant: req.body.constant
    }
    Productivity.findByIdAndUpdate(_id, {$set: updatedData})
    .then(() => {
        res.json(
                { message: 'Productivity updated successfully' }
        )
    })
    .catch(error => {
        res.json({
            message: 'An error Ocuured!'
        })
    })
}

const destroy = (req, res, next) => {
    let _id = req.body._id
    Productivity.findByIdAndRemove(_id)
    .then(() => {
        res.json({
            message: 'Productivity deleted successfully!'
        })
    })
    .catch(error => {
        res.json({
            message: 'An error Occured!'
        })
    })
}

module.exports = {
    index, productivity, indexProductivity, show, store, update, destroy
}