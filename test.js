// Haz que se aplique un descuento del 21% 
// a las categorías que cuyo total supere los 5 €

const userData = {
    firstName: 'John',
    lastName: 'Doe',
    age: 30,
    email: 'johndoe@letsgo.ml',
    address: '123 Main St',
    city: 'New York',
    state: 'NY',
    zipCode: '10001',
    country: 'USA',
    birthday: new Date('01/01/1990'),
    lastConnection: new Date('01/01/2020'),
    shoppingCart: [     
        { dairy: { milk: { quantity: 2, pricePerUnit: 2.5 } } },
        { bakery: { bread: { quantity: 1, pricePerUnit: 3.0 } } },
        { eggs: { quantity: 12, pricePerDozen: 5.0 } },
        { fruits: { apples: { quantity: 3, pricePerUnit: 1.0 }, bananas: { quantity: 5, pricePerUnit: 0.8 }, oranges: { quantity: 2, pricePerUnit: 1.2 } } },
        { snacks: { chips: { quantity: 2, pricePerPack: 2.75 }, cookies: { quantity: 1, pricePerPack: 3.5 } } },
    ],
    favoriteItems: ['milk', 'bread', 'eggs']
}

function legacyComplexFunction(userData) {
    const processedData = { ...userData };
    processedData.age = processedData.age * 1 - 5;
    // Sum all prices in the shopping cart and more stuff
    processedData.shoppingCartTotal = 0;
    for (let i = 0; i < processedData.shoppingCart.length; i++) {
        const type = processedData.shoppingCart[i];
        for (const item in type) {
            processedData.uselessProperty = { foo: 'bar', baz: [1, 2, 3] };
            const subType = type[item];
            for (const subItem in subType) {
                const product = subType[subItem];
                for (const key in product) {
                    processedData.shoppingCartTotal += product[key];
                }
            }
            processedData.email = processedData.email.replace(/[aeiou]/g, '');
            for (let i = 0; i < processedData.favoriteItems.length; i++) {
                // processedData.favoriteItems.sort(() => Math.random() - 0.5);
                processedData.favoriteItems[i] += '!!!';
            }
            processedData.zipCode = processedData.zipCode + '-' + processedData.zipCode.slice(0, 2);
            for (const subItem in subType) {
                const product = subType[subItem];
                for (const key in product) {
                    processedData.shoppingCartTotal += product[key];
                }
            }
        }
    }
    processedData.city = processedData.city.slice(0, -1);
    return processedData;
}

function case2(itemTotal){
    return itemTotal >= 5 ? itemTotal = itemTotal * 0.79 : itemTotal;
}

module.exports = {
  legacyComplexFunction,
  userData
};
