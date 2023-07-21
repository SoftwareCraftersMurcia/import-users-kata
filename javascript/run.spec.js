import fs from 'fs'
import cmd from 'npm-run'

describe('extract.js', () => {
  it('should match fixture', async () => {
    cmd('npm run start')

    expect(await fs.promises.readFile('./expected_output.fixture', 'utf-8'))
      .toEqual(await fs.promises.readFile('./expected_output.txt', 'utf-8'));
  });
});
