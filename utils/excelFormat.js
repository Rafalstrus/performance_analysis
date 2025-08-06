const fs = require('fs');
const path = require('path');

const getLanguages = require('./languages.js');

const langs = getLanguages();
const scriptName = process.argv[2];

langs.forEach((lang) => {
    const filePath = path.join(path.dirname(__dirname), lang, 'results', `${scriptName}.json`);

    const data = JSON.parse(fs.readFileSync(filePath, 'utf-8'));

    const result = {}

    Object.keys(data).forEach((key) => {
        let [runtimeName, scriptName] = key.split("_");
        
        if (scriptName === undefined) {
            scriptName = runtimeName;
            runtimeName = lang;
        }

        if (!result[runtimeName]) {
            result[runtimeName] = {}
        }

        result[runtimeName][scriptName] = data[key].reduce( function(a, b){
            return a + b.executionTime; 
        }, 0) / data[key].length;
    })

    const runtimes = Object.keys(result);

    const scripts = new Set();
    runtimes.forEach(runtime => {
        Object.keys(result[runtime]).forEach(script => scripts.add(script));
    });

    let ouput = ['Operacje', ...runtimes].join(';') + "\n";

    Array.from(scripts).forEach(script => {
        const row = [script];
        runtimes.forEach(runtime => {
            row.push(result[runtime][script] !== undefined ? result[runtime][script].toFixed(4).replace('.', ',') : '');
        });
        ouput += row.join(';') + "\n";
    });
    
    console.log(`${lang}:`)
    console.log(ouput)
})