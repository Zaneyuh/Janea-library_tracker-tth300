const API_URL = "/Integ-Prog/Janea/back_end";

const api = {

    // GET ALL BOOKS
    getAllBooks: async () => {
        const response = await fetch(`${API_URL}/get_books.php`);
        return await response.json();
    },

    // GET ONE BOOK
    getBookById: async (id) => {
        const response = await fetch(`${API_URL}/get_book.php?id=${id}`);
        return await response.json();
    },

    // ADD BOOK
    createBook: async (bookData) => {
        const response = await fetch(`${API_URL}/add_book.php`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(bookData)
        });

        return await response.json();
    },

    // UPDATE BOOK
    updateBook: async (id, bookData) => {
        const response = await fetch(`${API_URL}/update_book.php?id=${id}`, {
            method: "PUT",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(bookData)
        });

        return await response.json();
    },

    // DELETE BOOK
    deleteBook: async (id) => {
        const response = await fetch(`${API_URL}/delete_book.php?id=${id}`, {
            method: "DELETE"
        });

        return await response.json();
    }

};