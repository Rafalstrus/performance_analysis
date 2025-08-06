const fs = require("fs");
const path = require("path");

const excludeNames = ['.git', 'utils', 'shadow'];

function getLanguages() {
    const output = [];

    try {
        const parentDirPath = path.resolve(__dirname, "..");
        const items = fs.readdirSync(parentDirPath);

        for (const item of items) {
            const itemPath = path.join(parentDirPath, item);

            try {
                const stats = fs.statSync(itemPath);

                if (stats.isDirectory() && !excludeNames.includes(item)) {
                    output.push(item);
                }
            } catch (innerError) {
                console.warn(`Access Error ${itemPath}: ${innerError.message}`);
            }
        }
    } catch (error) {
        console.error(`Read error: ${error.message}`);

        throw error;
    }

  return output;
}

module.exports = getLanguages;