const fs = require('fs');
const path = require('path');

class Benchmarker {
    static executeScript(testedFunction, iterations) {
        const startTime = performance.now();

        for (let i = 0; i < iterations; i++) {
            testedFunction(i);
        }

        const endTime = performance.now();

        const executionTime = (endTime - startTime) / 1000;
        const memoryPeak = process.memoryUsage().heapUsed;

        this.saveResult(executionTime, memoryPeak);
    }

    static saveResult(executionTime, memoryPeak) {
        const scriptPath = process.argv[1];
        const scriptName = path.parse(scriptPath).name;
        const operationName = path.basename(path.dirname(scriptPath));
        const runtime = this.getRuntimeName()

        const resultFile = path.join(__dirname, 'results', `${operationName}.json`);

        let resultData = {};
        
        if (fs.existsSync(resultFile)) {
            resultData = JSON.parse(fs.readFileSync(resultFile, 'utf-8'));
        }

        const resultKey = runtime + '_' + path.basename(scriptName, '.js');

        if (!resultData[resultKey]) {
            resultData[resultKey] = [];
        }

        resultData[resultKey].push({
            executionTime,
            memoryPeak
        });

        fs.writeFileSync(resultFile, JSON.stringify(resultData, null, 2), 'utf-8');
    }

    static getRuntimeName() {
        if (typeof Bun !== 'undefined') {
            return 'bun';
        }

        if (typeof Deno !== 'undefined') {
            return 'deno';
        }

        return 'node';
    }
}

module.exports = Benchmarker;