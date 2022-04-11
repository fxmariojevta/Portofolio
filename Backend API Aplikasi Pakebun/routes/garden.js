const express = require('express')
const router = express.Router()

const GardenController = require('../controllers/GardenController')

router.get('/:email', GardenController.index)
router.get('/detail/:_id', GardenController.detail)

router.post('/show', GardenController.show)
router.post('/store', GardenController.store)
router.post('/update', GardenController.update)
router.post('/delete', GardenController.destroy)
router.get('/detail', GardenController.indexDetail)
router.post('/detail/show', GardenController.showDetail)
router.post('/detail/store', GardenController.storeDetail)
router.post('/detail/update', GardenController.updateDetail)
router.post('/detail/delete', GardenController.destroyDetail)

module.exports = router