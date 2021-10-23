const Plant = require('../models/Plant')
const Disease = require('../models/Disease')
const Symptom = require('../models/Symptom')

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

const indexDisease = (req, res, next) => {
    Disease.find()
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

const disease = (req, res, next) => {
    Disease.find({plant: req.params._id}, { 
        _id: 1,
        image: 1, 
        title: 1, 
        description: 1, 
        solution: 1})
    .then(disease => {
        res.json({
            response: 'succeed',
            message: 'Get Data Succeed',
            value: {
                cmd: 'Plant Disease List',
                data: disease
            }
        })
    })
    .catch(error => {
        res.json({
            message: 'An error Occured'
        })
    })
}

const showDisease = (req, res, next) => {
    Disease.findById(req.body._id)
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

const storeDisease = (req, res, next) => {
    let disease = new Disease({
        plant: req.body.plant,
        image: req.body.image,
        title: req.body.title,
        description: req.body.description,
        solution: req.body.solution
    })
    disease.save()
    .then(response => {
        res.json({
            message: 'Plant Disease Added Successfully!'
        })
    })
    .catch(error => {
        res.json({
            message: 'An error Ocuured!'
        })
    })
}

const updateDisease = (req, res, next) => {
    let _id = req.body._id
    let updatedData = {
        plant: req.body.plant,
        image: req.body.image,
        title: req.body.title,
        description: req.body.description,
        solution: req.body.solution
    }
    Disease.findByIdAndUpdate(_id, {$set: updatedData})
    .then(() => {
        res.json(
                { message: 'Plant Disease updated successfully' }
        )
    })
    .catch(error => {
        res.json({
            message: 'An error Ocuured!'
        })
    })
}

const destroyDisease = (req, res, next) => {
    let _id = req.body._id
    Disease.findByIdAndRemove(_id)
    .then(() => {
        res.json({
            message: 'Plant Disease deleted successfully!'
        })
    })
    .catch(error => {
        res.json({
            message: 'An error Occured!'
        })
    })
}

const symptom = (req, res, next) => {
    Symptom.find({plant: req.params._id}, { 
        _id: 1,
        image: 1, 
        title: 1} )
    .then(symptom => {
        res.json({
            response: 'succeed',
            message: 'Get Data Succeed',
            value: {
                cmd: 'Plant Disease Symptom List',
                data: symptom
            }
        })
    })
    .catch(error => {
        res.json({
            message: 'An error Occured'
        })
    })
}

const indexSymptom = (req, res, next) => {
    Symptom.find()
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

const showSymptom = (req, res, next) => {
    Symptom.findById(req.body._id)
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

const storeSymptom = (req, res, next) => {
    let symptom = new Symptom({
        plant: req.body.plant,
        image: req.body.image,
        title: req.body.title
    })
    symptom.save()
    .then(response => {
        res.json({
            message: 'Plant Disease Symptom Added Successfully!'
        })
    })
    .catch(error => {
        res.json({
            message: 'An error Ocuured!'
        })
    })
}

const updateSymptom = (req, res, next) => {
    let _id = req.body._id
    let updatedData = {
        plant: req.body.plant,
        image: req.body.image,
        title: req.body.title
    }
    Symptom.findByIdAndUpdate(_id, {$set: updatedData})
    .then(() => {
        res.json(
                { message: 'Plant Disease Symptom updated successfully' }
        )
    })
    .catch(error => {
        res.json({
            message: 'An error Ocuured!'
        })
    })
}

const destroySymptom = (req, res, next) => {
    let _id = req.body._id
    Symptom.findByIdAndRemove(_id)
    .then(() => {
        res.json({
            message: 'Plant Disease Symptom deleted successfully!'
        })
    })
    .catch(error => {
        res.json({
            message: 'An error Occured!'
        })
    })
}

module.exports = {
    index, disease, symptom, indexDisease, showDisease, storeDisease, updateDisease, destroyDisease, indexSymptom, showSymptom, storeSymptom, updateSymptom, destroySymptom
}