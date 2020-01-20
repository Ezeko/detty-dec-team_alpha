const express = require('express');
const router = express.Router();
const Schools = require('../controller/services')


router.get('/', Schools.getSchools);
router.get('/:parameter', Schools.withParameters);
router.post('/', Schools.addSchool);

module.exports = router;