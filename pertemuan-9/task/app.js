const { index, store, update, destroy } = require("./controller/FruitController.js");

const main = () => {
    console.log(`Method index - Menampilkan Buah`);
    index();
    console.log("");
    store("Pisang");
    console.log("");
    update(0, "Kelapa");
    console.log("");
    destroy(0);
};

main();