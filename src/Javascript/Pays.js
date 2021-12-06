 export class Pays {

    libelle;
    id; 

    constructor(id, libelle) {
        this.libelle = libelle;
        this.id = id;
    }

     get id() {
        return this.id;
    }

     set id(id) {
        this.id = id;
    }

     get libelle() {
        return this.libelle;
    }

     set libelle(libelle) {
        this.libelle = libelle;
    }
}