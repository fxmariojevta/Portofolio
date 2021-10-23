const Garden = require('../models/Garden')
const GardenDetail = require('../models/GardenDetail')

const index = (res, next) => {
    Garden.find({}, { _id: 1, image: 1, title: 1, location: 1 } )
    .then(garden => {
        res.json({
            response: 'succeed',
            message: 'Get Data Succeed',
            value: {
                cmd: 'Garden List',
                data: garden
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
    GardenDetail.find({Garden: req.params._id}, { 
        _id: 1,
        image: 1, 
        status: 1, 
        name: 1, 
        location: 1,
        updatedAt: 1,
        zone: 1})
    .then(detail => {
        res.json({
            response: 'succeed',
            message: 'Get Data Succeed',
            value: {
                cmd: 'Garden Detail List',
                data: detail
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
    Garden.findById(req.body._id)
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
    let garden = new Garden({
        image: req.body.image,
        title: req.body.title,
        location: req.body.location
    })
    garden.save()
    .then(response => {
        res.json({
            message: 'Garden Added Successfully!'
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
        title: req.body.title,
        location: req.body.location
    }
    Garden.findByIdAndUpdate(_id, {$set: updatedData})
    .then(() => {
        res.json(
                { message: 'Garden updated successfully' }
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
    Garden.findByIdAndRemove(_id)
    .then(() => {
        res.json({
            message: 'Garden deleted successfully!'
        })
    })
    .catch(error => {
        res.json({
            message: 'An error Occured!'
        })
    })
}

const indexDetail = (params, res, next) => {
    GardenDetail.find({})
    .then(gardenDetail => {
        res.json({
            response: 'succeed',
            message: 'Get Data Succeed',
            value: {
                cmd: 'Detail Garden List',
                data: gardenDetail
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
    GardenDetail.findById(req.body._id)
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
    let gardenDetail = new GardenDetail({
        garden: req.body.garden,
        image: req.body.image,
        status: req.body.status,
        name: req.body.name,
        location: req.body.location,
        zone: [{
            title: req.body.title,
            plant: req.body.plant,
            harvest_time: req.body.harvest_time,
            soil: {
                temperature: req.body.soil_temperature,
                water_content: req.body.water_content,
                nutrition: req.body.nutrition,
                light: req.body.light
            },
            environment: {
                temperature: req.body.environtment_temperature,
                humidity: req.body.humidity,
                air_pressure: req.body.air_pressure
            }
        }]
    })
    gardenDetail.save()
    .then(response => {
        res.json({
            message: 'Detail Garden Added Successfully!'
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
        garden: req.body.garden,
        image: req.body.image,
        status: req.body.status,
        name: req.body.name,
        location: req.body.location,
        zone: [{
            title: req.body.title,
            plant: req.body.plant,
            harvest_time: req.body.harvest_time,
            soil: {
                temperature: req.body.soil_temperature,
                water_content: req.body.water_content,
                nutrition: req.body.nutrition,
                light: req.body.light
            },
            environment: {
                temperature: req.body.environtment_temperature,
                humidity: req.body.humidity,
                air_pressure: req.body.air_pressure
            }
        }]
    }
    GardenDetail.findByIdAndUpdate(_id, {$set: updatedData})
    .then(() => {
        res.json(
                { message: 'Detail Garden updated successfully' }
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
    GardenDetail.findByIdAndRemove(_id)
    .then(() => {
        res.json({
            message: 'Detail Garden deleted successfully!'
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