const getStorageBooks = () => JSON.parse(localStorage.getItem('books')) || [];
const saveStorageBooks = (books) => localStorage.setItem('books', JSON.stringify(books));

const api = {
    // READ ALL
    getAllBooks: async () => {
        return getStorageBooks();
    },

    // READ ONE (For editing)
    getBookById: async (id) => {
        const books = getStorageBooks();
        return books.find(book => book.id === id) || null;
    },

    // CREATE
    createBook: async (bookData) => {
        const books = getStorageBooks();
        const newBook = { 
            id: Date.now().toString(), // Generates a unique string ID
            ...bookData 
        };
        books.push(newBook);
        saveStorageBooks(books);
        return newBook;
    },

    // UPDATE
    updateBook: async (id, updatedData) => {
        let books = getStorageBooks();
        books = books.map(book => book.id === id ? { ...book, ...updatedData } : book);
        saveStorageBooks(books);
        return true;
    },

    // DELETE
    deleteBook: async (id) => {
        let books = getStorageBooks();
        books = books.filter(book => book.id !== id);
        saveStorageBooks(books);
        return true;
    }
};