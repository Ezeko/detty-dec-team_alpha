const express = require('express');
const mongoose = require('mongoose');
const app = express();

const bodyParser = require('body-parser');

//connecting to atlas

mongoose.connect('mongodb+srv://Ezeko:roJvlMY8Lqep3SxB@cluster0-rlzyx.mongodb.net/test?retryWrites=true&w=majority',{useNewUrlParser: true, useUnifiedTopology: true})
    .then(()=>{
        console.log('connected to mongodb atlas successfully!');
    })
    .catch((error)=>{
        console.log({
            error: error
        });
    });

    app.use((req,res,next)=>{
        res.setHeader('Access-Control-Allow-Origin', '*');
        res.setHeader('Access-Control-Allow-Headers', 'Origin, X-Requested-With, Content, Accept, Content-Type, Authorization');
        res.setHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    
        next();
    
    }); //allows access to api in any platform
    
    app.use(bodyParser.json()); // change request to json

    app.use((req, res, next)=>{
       const nav = navigator.geolocation;
        res.status(400).json({
            Location: nav
            
        })
    })