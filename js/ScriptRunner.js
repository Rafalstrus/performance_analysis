
const fs = require('fs');
const path = require('path');
const { execSync } = require('child_process');

class ScriptRunner {
    static check(operation, repeatCount = 1) {
        this.runAllScripts(operation, repeatCount, 'node --no-warnings --no-deprecation --enable-source-maps=false');
        this.runAllScripts(operation, repeatCount, 'deno run --no-check --allow-all');
        this.runAllScripts(operation, repeatCount, 'bun run --no-source-maps --optimize');
    }

    static runAllScripts(relativePath, repeatCount, runtime, options = null) {
        const fullPath = path.join(__dirname, relativePath);
        const files = fs.readdirSync(fullPath);

        for (const file of files) {
            const fullFilePath = path.join(fullPath, file);
            const isFile = fs.statSync(fullFilePath).isFile();

            if (isFile) {
                const name = path.basename(file, path.extname(file));

                for (let i = 0; i < repeatCount; i++) {
                    this.runScript(relativePath, name, runtime, options);
                }
            }
        }
    }

    static runScript(relativePath, scriptName, runtime, options) {
        const scriptPath = path.join(__dirname, relativePath, `${scriptName}.js`);
        execSync(`${runtime} "${scriptPath}" ${options ?? ''}`);
        //console.log(execSync(`${runtime} "${scriptPath}" ${options ?? ''}`).toString());
    }
}

const operation = process.argv[2];
const repeatCount = parseInt(process.argv[3] || '1', 10);

if (!operation) {
    throw new Error('No operation chosen!');
}

ScriptRunner.check(operation, repeatCount);