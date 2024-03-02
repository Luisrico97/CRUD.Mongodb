db

db.enterprise.insertMany([
    {
        nombre_empresa: "Creativos Pro",
        descripcion: "Creativos Pro es una empresa de diseño especializada en ofrecer soluciones creativas y efectivas para empresas de todos los tamaños. Nuestro equipo de diseñadores talentosos trabaja en estrecha colaboración con nuestros clientes para crear logotipos únicos, materiales de marketing impresionantes y sitios web atractivos.",
        ubicacion: "Monteverde #49, Hermosillo, Sonora",
        telefono: "+1234567890",
        correo_electronico: "info@creativospro.com"
    },
    {
        nombre_empresa: "Visionario Design",
        descripcion: "Visionario Design es una agencia de diseño innovadora que se especializa en proporcionar soluciones visuales excepcionales para empresas en todos los sectores. Desde la creación de logotipos memorables hasta la conceptualización de campañas publicitarias impactantes, nuestro equipo trabaja incansablemente para superar las expectativas de nuestros clientes.",
        ubicacion: "Calle Creatividad #100, Hermosillo, Sonora",
        telefono: "+9876543210",
        correo_electronico: "contact@visionariodesign.com"
    },
    {
        nombre_empresa: "Estudio Imagen",
        descripcion: "Estudio Imagen es una empresa de diseño líder que se especializa en la creación de identidades visuales sólidas y efectivas para marcas en crecimiento. Nuestro enfoque centrado en el cliente nos permite colaborar estrechamente con empresas de todos los sectores para desarrollar estrategias de diseño personalizadas que reflejen su identidad única y conecten con su audiencia.",
        ubicacion: "Avenida Sierra del sur #50, Hermosillo, Sonora",
        telefono: "+1357924680",
        correo_electronico: "hello@estudioimagen.com"
    },
    {
        nombre_empresa: "Genio Creativo",
        descripcion: "Genio Creativo es una agencia de diseño versátil que se especializa en ofrecer soluciones creativas y prácticas para empresas en todo el mundo. Nuestro equipo de diseñadores expertos combina habilidades técnicas con una visión innovadora para crear diseños impactantes que ayudan a nuestros clientes a destacarse en un mercado competitivo.",
        ubicacion: "Plaza Dila #25, Hermosillo, Sonora",
        telefono: "+2468013579",
        correo_electronico: "info@geniocreativo.com"
    }
])

db.empresas_diseño.find()
db.empresas_diseño.drop()
