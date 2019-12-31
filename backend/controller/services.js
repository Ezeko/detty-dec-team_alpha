const School = require('../models/School');

exports.getSchools = (async (req, res, next)=>{

    const statusCode = res.status;
    if  (statusCode === 400 || statusCode <=404 ){
        return res.send({
            error
        })
    }else{
       await School.find().then((schools)=>{
           if (schools.length < 1){
               res.send({
                   data: "No School found"
               });
           }else{ 
             res.status(200).json({
                message: okay,
                data: schools}
                );
            console.log("getSchool Working");
        }}).catch((error)=>{
            return res.status(400).json(error)
        })

           }next()
        
        });
          

