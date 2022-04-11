const Plant = require('../models/Plant')
const PlantDetail = require('../models/PlantDetail')

const index = (req, res, next) => {
    Plant.find({}, { _id: 1, image: 1, name: 1, title: 1 })
    .then(plant => {
        res.json({
            response: 'succeed',
            message: 'Get Data Succeed',
            value: {
                cmd: 'Plant List',
                page: req.params.page,
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

const detail = (req, res, next) => {
    PlantDetail.find({plant: req.params._id}, { 
        name: 1, 
        familia: 1, 
        genus: 1, 
        harvest_estimate: 1, 
        temperature: 1, 
        humidity: 1, 
        soil_humidity: 1, 
        soil_nutrition: 1, 
        light_needed: 1, 
        ph: 1, 
        description: 1 })
    .then(plantDetail => {
        res.json({
            response: 'succeed',
            message: 'Get Data Succeed',
            value: {
                cmd: 'Plant Detail',
                data: plantDetail
            }
        })
    })
    .catch(error => {
        res.json({
            message: 'An error Occured'
        })
    })
}

const show = (req, res, next) => {
    Plant.findById(req.body._id)
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
    let plant = new Plant({
        image: req.body.image,
        name: req.body.name,
        title: req.body.title
    })
    plant.save()
    .then(response => {
        res.json({
            message: 'Plant Added Successfully!'
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
        image: req.body.image,
        name: req.body.name,
        title: req.body.title
    }
    Plant.findByIdAndUpdate(_id, {$set: updatedData})
    .then(() => {
        res.json(
                { message: 'Plant updated successfully' }
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
    Plant.findByIdAndRemove(_id)
    .then(() => {
        res.json({
            message: 'Plant deleted successfully!'
        })
    })
    .catch(error => {
        res.json({
            message: 'An error Occured!'
        })
    })
}

const indexDetail = (params, res, next) => {
    PlantDetail.find({})
    .then(plantDetail => {
        res.json({
            response: 'succeed',
            message: 'Get Data Succeed',
            value: {
                cmd: 'Detail Plant List',
                data: plantDetail
            }
        })
    })
    .catch(error => {
        res.json({
            message: 'An error Occured'
        })
    })
}

const showDetail = (req, res, next) => {
    PlantDetail.findById(req.body._id)
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

const storeDetail = (req, res, next) => {
    let plantDetail = new PlantDetail({
        plant: req.body.plant,
        name: req.body.name,
        familia: req.body.familia,
        genus: req.body.genus,
        harvest_estimate: req.body.harvest_estimate,
        temperature: req.body.temperature,
        humidity: req.body.humidity,
        soil_humidity: req.body.soil_humidity,
        soil_nutrition: req.body.soil_nutrition,
        light_needed: req.body.light_needed,
        ph: req.body.ph,
        description: req.body.description
    })
    plantDetail.save()
    .then(response => {
        res.json({
            message: 'Detail Plant Added Successfully!'
        })
    })
    .catch(error => {
        res.json({
            message: 'An error Ocuured!'
        })
    })
}

const updateDetail = (req, res, next) => {
    let _id = req.body._id
    let updatedData = {
        plant: req.body.plant,
        name: req.body.name,
        familia: req.body.familia,
        genus: req.body.genus,
        harvest_estimate: req.body.harvest_estimate,
        temperature: req.body.temperature,
        humidity: req.body.humidity,
        soil_humidity: req.body.soil_humidity,
        soil_nutrition: req.body.soil_nutrition,
        light_needed: req.body.light_needed,
        ph: req.body.ph,
        description: req.body.description
    }
    PlantDetail.findByIdAndUpdate(_id, {$set: updatedData})
    .then(() => {
        res.json(
                { message: 'Detail Plant updated successfully' }
        )
    })
    .catch(error => {
        res.json({
            message: 'An error Ocuured!'
        })
    })
}

const destroyDetail = (req, res, next) => {
    let _id = req.body._id
    PlantDetail.findByIdAndRemove(_id)
    .then(() => {
        res.json({
            message: 'Detail Plant deleted successfully!'
        })
    })
    .catch(error => {
        res.json({
            message: 'An error Occured!'
        })
    })
}

module.exports = {
    index, detail, show, store, update, destroy, indexDetail, showDetail, storeDetail, updateDetail, destroyDetail
}