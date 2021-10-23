const express = require('express')
const router = express.Router()

const PlantController = require('../controllers/PlantController')
const DiseaseController = require('../controllers/DiseaseController')
const FertilizerController = require('../controllers/FertilizerController')
const ProductivityController = require('../controllers/ProductivityController')

router.get('/:page', PlantController.index)
router.get('/detail/:_id', PlantController.detail)
router.get('/disease', DiseaseController.index)
router.get('/disease/:_id', DiseaseController.disease)
router.get('/disease/symptom/:_id', DiseaseController.symptom)
router.get('/fertilizer', FertilizerController.index)
router.post('/productivity', ProductivityController.index)

router.post('/show', PlantController.show)
router.post('/store', PlantController.store)
router.post('/update', PlantController.update)
router.post('/delete', PlantController.destroy)
router.get('/detail/index/all', PlantController.indexDetail)
router.post('/detail/show', PlantController.showDetail)
router.post('/detail/store', PlantController.storeDetail)
router.post('/detail/update', PlantController.updateDetail)
router.post('/detail/delete', PlantController.destroyDetail)

router.get('/disease/index/all', DiseaseController.indexDisease)
router.post('/disease/show', DiseaseController.showDisease)
router.post('/disease/store', DiseaseController.storeDisease)
router.post('/disease/update', DiseaseController.updateDisease)
router.post('/disease/delete', DiseaseController.destroyDisease)
router.get('/disease/symptom/index/all', DiseaseController.indexSymptom)
router.post('/disease/symptom/show', DiseaseController.showSymptom)
router.post('/disease/symptom/store', DiseaseController.storeSymptom)
router.post('/disease/symptom/update', DiseaseController.updateSymptom)
router.post('/disease/symptom/delete', DiseaseController.destroySymptom)

router.get('/fertilizer/index/all', FertilizerController.indexFertilizer)
router.post('/fertilizer/show', FertilizerController.showFertilizer)
router.post('/fertilizer/store', FertilizerController.storeFertilizer)
router.post('/fertilizer/update', FertilizerController.updateFertilizer)
router.post('/fertilizer/delete', FertilizerController.destroyFertilizer)

router.get('/productivity/index/all', ProductivityController.indexProductivity)
router.post('/productivity/show', ProductivityController.show)
router.post('/productivity/store', ProductivityController.store)
router.post('/Productivity/update', ProductivityController.update)
router.post('/productivity/delete', ProductivityController.destroy)

module.exports = router