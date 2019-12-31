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
                   data: "0 School found"
               });
           }else{ 
             res.status(200).json({
                message: 'okay',
                data: schools}
                );
            console.log("getSchool Working");
        }}).catch((error)=>{
            return res.status(400).json(error)
        })

           }next()
        
        });

exports.withParameters = (async (req, res, next)=>{
    const location = req.params.location;
    const environment = req.params.environment;
    const schoolType = req.params.schoolType;
    const standard = req.params.standard;
    const fee = req.params.fees;

    await School.find({where: {location} || {environment} 
        ||{schoolType} || {standard} || {fee}
    }).then((schools)=>{
        if(schools.length > 0){
            return res.status(200).json({
                message: 'okay',
                data: schools
            })
        }else{
            return res.json({
                message: 'ok',
                data:"No match(es) found for search"})
        }
    }). catch((error)=>{
        return res.status(400).json(error);
    })

    next();
})

exports.addSchool = (async (req, res, next)=>{

    const school = new School({
        name: req.body.name,
        description: req.body.description,
        location: req.body.location,
        fee: req.body.fee,
        imageUrl: req.body.imageUrl,
        logoUrl: req.body.logoUrl,
        standard: req.body.standard,
        environment: req.body.environment,
        schoolType: req.body.schoolType,
    });

    await school.save().then(()=>{
        return res.status(201).json({
            message: "School added successfully!"
        })
    }).catch((error)=>{
        return res.status(400).json(error);
    })

    next();
})

/**
    school = new School({
        name: "Atlantic Hall Schools",
        description: "Cool and nice environment with moderate fees",
        location: "Lagos",
        fee: 500000,
        imageUrl: "https://res.cloudinary.com/taofeeq/image/upload/v1576227027/dettyDecember/school_jnujxr.png",
        logoUrl: "https://res.cloudinary.com/taofeeq/image/upload/v1576227027/dettyDecember/schoolLogo_s0d00e.png",
        standard: "British",
        environment: "Clean",
        schoolType: "Secondary", */