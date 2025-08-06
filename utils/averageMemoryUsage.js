const fs = require('fs');
const path = require('path');

const getLanguages = require('./languages.js');

const langs = getLanguages();
const scriptName = process.argv[2];

langs.forEach((lang) => {
    const result = {};
    const filePath = path.join(path.dirname(__dirname), lang, 'results', `${scriptName}.json`);
    const data = JSON.parse(fs.readFileSync(filePath, 'utf-8'));

    Object.keys(data).forEach((key) => {
        result[key] = 0;
        
        for (const z in data[key]) {
            if (z === '_super') {
                continue;
            }

            result[key] += data[key][z].memoryPeak;
        }

        result[key] /= data[key].length;
    })

    console.log(`${lang}:`)

    for (let x in result) {
        console.log(x,  Math.ceil((result[x] / 1024 / 1024) * 100) / 100, 'MB');
    }
})