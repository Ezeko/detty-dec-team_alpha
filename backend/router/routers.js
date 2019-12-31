const express = require('express');
const router = express.Router();
const Schools = require('../controller/services')


router.get('/getschool', Schools.getSchools);

module.exports = router;