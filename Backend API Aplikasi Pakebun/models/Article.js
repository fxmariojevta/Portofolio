const mongoose = require('mongoose')
const Schema = mongoose.Schema

const articleSchema = new Schema({
    image: {
        type: String
    },
    title: {
        type: String
    },
    category: {
        type: String
    },
    description: {
        type: String
    }
}, {timestamps: true})

const Article = mongoose.model('Article', articleSchema)
module.exports = Article