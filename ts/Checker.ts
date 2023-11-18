class Checker {
    static fs = require('fs')
    
    static check(path: string ): void {
        this.fs.readdir(path, (err, files) => {
            if (err) {
                console.error('Error reading folder:', err);

                return;
              }
        })
    }
}