const FarmingStep = require('../models/FarmingStep')
const Consultation = require('../models/Consultation')

const index = (req, res, next) => {
    FarmingStep.find({}, {  
        title: 1,
        step_detail: 1} )
    .then(farmingStep => {
        res.json({
            response: 'succeed',
            message: 'Get Data Succeed',
            value: {
                cmd: 'Learn To Farm List',
                data: farmingStep
            }
        })
    })
    .catch(error => {
        res.json({
            message: 'An error Occured'
        })
    })
}

const indexFarmingStep = (req, res, next) => {
    FarmingStep.find()
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

const showFarmingStep = (req, res, next) => {
    FarmingStep.findById(req.body._id)
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

const storeFarmingStep = (req, res, next) => {
    let farmingStep = new FarmingStep({
        title: req.body.title,
        step_detail: [{
            image: req.body.image,
            step: req.body.step,
            description: req.body.description
        }]
    })
    farmingStep.save()
    .then(response => {
        res.json({
            message: 'Farming Step Added Successfully!'
        })
    })
    .catch(error => {
        res.json({
            message: 'An error Ocuured!'
        })
    })
}

const updateFarmingStep = (req, res, next) => {
    let _id = req.body._id
    let updatedData = {
        title: req.body.title,
        step_detail: [{
            image: req.body.image,
            step: req.body.step,
            description: req.body.description
        }]
    }
    FarmingStep.findByIdAndUpdate(_id, {$set: updatedData})
    .then(() => {
        res.json(
                { message: 'Farming Step updated successfully' }
        )
    })
    .catch(error => {
        res.json({
            message: 'An error Ocuured!'
        })
    })
}

const destroyFarmingStep = (req, res, next) => {
    let _id = req.body._id
    FarmingStep.findByIdAndRemove(_id)
    .then(() => {
        res.json({
            message: 'Farming Step deleted successfully!'
        })
    })
    .catch(error => {
        res.json({
            message: 'An error Occured!'
        })
    })
}

const consultation = (req, res, next) => {
    Consultation.find({symptom: req.body.symptom}, { 
        _id: 1,
        image: 1, 
        title: 1,
        description: 1,
        solution: 1,
        percentage: 1})
    .then(consultation => {
        res.json({
            response: 'succeed',
            message: 'Get Data Succeed',
            value: {
                cmd: 'Disease Detection',
                data: consultation
            }
        })
    })
    .catch(error => {
        res.json({
            message: 'An error Occured'
        })
    })
}

const indexConsultation = (req, res, next) => {
    Consultation.find()
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

const showConsultation = (req, res, next) => {
    Consultation.findById(req.body._id)
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

const storeConsultation = (req, res, next) => {
    let consultation = new Consultation({
        symptom: [req.body.symptom],
        image: req.body.image,
        title: req.body.title,
        description: req.body.description,
        solution: req.body.solution,
        percentage: req.body.percentage
    })
    consultation.save()
    .then(response => {
        res.json({
            message: 'Consultation Added Successfully!'
        })
    })
    .catch(error => {
        res.json({
            message: 'An error Ocuured!'
        })
    })
}

const updateConsultation = (req, res, next) => {
    let _id = req.body._id
    let updatedData = {
        symptom: [req.body.symptom],
        image: req.body.image,
        title: req.body.title,
        description: req.body.description,
        solution: req.body.solution,
        percentage: req.body.percentage
    }
    Consultation.findByIdAndUpdate(_id, {$set: updatedData})
    .then(() => {
        res.json(
                { message: 'Consultation updated successfully' }
        )
    })
    .catch(error => {
        res.json({
            message: 'An error Ocuured!'
        })
    })
}

const destroyConsultation = (req, res, next) => {
    let _id = req.body._id
    Consultation.findByIdAndRemove(_id)
    .then(() => {
        res.json({
            message: 'Consultation deleted successfully!'
        })
    })
    .catch(error => {
        res.json({
            message: 'An error Occured!'
        })
    })
}

const population = (req, res, next) => {
    if(parseInt(req.body.area) > 0 && parseInt(req.body.bedDistance) > 0 && parseInt(req.body.plantDistance) > 0) {
        var populations = parseInt(req.body.area) / (parseInt(req.body.bedDistance) * parseInt(req.body.plantDistance))
        res.json({
            response: 'succeed',
            message: 'Get Data Succeed',
            data: {populations}
        })
    }
    else{
        res.json({
            response: 'failed',
            message: 'Variabel tidak boleh bernilai 0'
        })
    }
}

module.exports = {
    index, consultation, population, indexFarmingStep, showFarmingStep, storeFarmingStep, updateFarmingStep, destroyFarmingStep, indexConsultation, showConsultation, storeConsultation, updateConsultation, destroyConsultation
}