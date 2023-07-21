import {extract} from "./extract.js";
import fs from 'fs'
describe('extract.js', () => {
  it('should match fixture', async () => {
    await extract()

    expect(fs.readFileSync('./expected_output.fixture'))
      .toEqual(fs.readFileSync('./expected_output.txt'));
  });
});
