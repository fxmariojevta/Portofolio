const express = require('express')
const router = express.Router()

const ArticleController = require('../controllers/ArticleController')

router.get('/:page', ArticleController.index)
router.get('/detail/:_id', ArticleController.detail)

router.post('/show', ArticleController.show)
router.post('/store', ArticleController.store)
router.post('/update', ArticleController.update)
router.post('/delete', ArticleController.destroy)

module.exports = router