const Article = require('../models/Article')

const index = (req, res, next) => {
    Article.find({}, { 
        _id: 1, 
        image: 1, 
        title: 1,
        createdAt: 1,
        category: 1 })
    .then(article => {
        res.json({
            response: 'succeed',
            message: 'Get Data Succeed',
            value: {
                cmd: 'Article List',
                page: req.params.page,
                data: article
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
    Article.find({_id: req.params._id}, { 
        image: 1, 
        title: 1,
        createdAt: 1,
        category: 1,
        description: 1 })
    .then(article => {
        res.json({
            response: 'succeed',
            message: 'Get Data Succeed',
            value: {
                cmd: 'Article Detail',
                data: article
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
    Article.findById(req.body._id)
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
    let article = new Article({
        image: req.body.image,
        title: req.body.title,
        category: req.body.category,
        description: req.body.description
    })
    article.save()
    .then(response => {
        res.json({
            message: 'Article Added Successfully!'
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
        category: req.body.category,
        description: req.body.description
    }
    Article.findByIdAndUpdate(_id, {$set: updatedData})
    .then(() => {
        res.json(
                { message: 'Article updated successfully' }
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
    Article.findByIdAndRemove(_id)
    .then(() => {
        res.json({
            message: 'Article deleted successfully!'
        })
    })
    .catch(error => {
        res.json({
            message: 'An error Occured!'
        })
    })
}

module.exports = {
    index, detail, show, store, update, destroy
}