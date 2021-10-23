const express = require('express')
const router = express.Router()

const ToolsController = require('../controllers/ToolsController')
const FertilizerController = require('../controllers/FertilizerController')
const ProductivityController = require('../controllers/ProductivityController')

router.get('/farmingstep', ToolsController.index)
router.post('/detection/disease', ToolsController.consultation)
router.post('/calculate/fertilizer', FertilizerController.calculate)
router.post('/calculate/population', ToolsController.population)
router.post('/calculate/productivity', ProductivityController.productivity)

router.get('/farmingstep/index/all', ToolsController.indexFarmingStep)
router.post('/farmingstep/show', ToolsController.showFarmingStep)
router.post('/farmingstep/store', ToolsController.storeFarmingStep)
router.post('/farmingstep/update', ToolsController.updateFarmingStep)
router.post('/farmingstep/delete', ToolsController.destroyFarmingStep)

router.get('/consultation/index/all', ToolsController.indexConsultation)
router.post('/consultation/show', ToolsController.showConsultation)
router.post('/consultation/store', ToolsController.storeConsultation)
router.post('/consultation/update', ToolsController.updateConsultation)
router.post('/consultation/delete', ToolsController.destroyConsultation)

module.exports = router