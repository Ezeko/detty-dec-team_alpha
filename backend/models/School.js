const mongoose = require('mongoose');

const schoolSchema = mongoose.Schema(
    {
        name: { type: String, required: true},
        description: { type: String, required: true},
        location: { type: String, required: true},
        fee: { type: Number, required: true},
        imageUrl: { type: String, required: true},
        standard: { type: String, required: true},
        environment: { type: String, required: true},
        schoolType: { type: String, required: true},
    }
);

module.exports = mongoose.model('School', schoolSchema);

