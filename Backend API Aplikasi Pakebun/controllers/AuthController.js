const User = require('../models/User')
const bcrypt = require('bcryptjs')
const jwt = require('jsonwebtoken')

const register = (req, res, next) => {
    bcrypt.hash(req.body.password, 10, function(err, hashedPass) {
        if(err) {
            res.json({
                error: err
            })
        }

        User.findOne({$or: [{email:req.body.email}]})
        .then(user => {
            if(user){
                res.json({
                    response: 'failed',
                    message: 'Pendaftaran Gagal, Email sudah terdaftar'
                })
            }
            else{
                let newUser = new User ({
                    name: req.body.name,
                    email: req.body.email,
                    phone: req.body.phone,
                    password: hashedPass
                })
                newUser.save()
                .then(newUser => {
                    res.json({
                        reponse: 'succeed',
                        message: "Pendaftaran Berhasil"
                    })
                })
                .catch(error =>{
                    res.json({
                        response: 'failed',
                        message: "Pendaftaran Gagal"
                    })
                })
            }
        })
    })
}

const login = (req, res, next) => {
    var username = req.body.email
    var password = req.body.password

    User.findOne({$or: [{email:username}]})
    .then(user => {
        if(user){
            bcrypt.compare(password, user.password, function(err, result) {
                if(err){
                    res.json({
                        error: err
                    })
                }
                if(result){
                    let token = jwt.sign({name: user.email}, 'pandoraKey', {expiresIn: '1hr'})
                    res.json({
                        reponse: 'succeed',
                        message: 'Login Berhasil',
                        value: {
                            email: user.email,
                            name: user.name
                        },
                        //token
                    })
                }
                else{
                    res.json({
                        response: 'failed',
                        message: 'Login Gagal, Email atau Password salah'
                    })
                }
            })
        }
        else{
            res.json({
                response: 'failed',
                message: 'Login Gagal, Email atau Password salah'
            })
        }
    })
}

const reset = (req, res, next) => {
    User.findOne({$or: [{email:req.body.email}]})
    .then(user => {
        if(user){
            res.json({
                response: 'succeed',
                message: 'Link reset password sudah dikirimkan ke email yang terdaftar'
            })
        }
        else{
            res.json({
                response: 'failed',
                message: 'Email tidak terdaftar'
            })
        }
    })
}

module.exports = {
    register, login, reset
}

