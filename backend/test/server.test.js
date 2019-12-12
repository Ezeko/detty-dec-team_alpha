
const chai = require('chai');
const chaiHttp = require('chai-http');
const app = require('../app')


chai.use(chaiHttp);
chai.should()

const {
  expect
} = chai;

describe('Server Connection', () => {
  it('it should connect to database and run server', (done) => {
    chai.request(app)
      .get('/')
      .end((error, res) => {
        expect(res).to.have.status(200);
        done();
      });
  });
});