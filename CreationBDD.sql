DROP DATABASE IF EXISTS ap4;
CREATE DATABASE IF NOT EXISTS ap4;
USE ap4;

-- ----------------------------------------------------

CREATE TABLE Users (
    idUser INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    avatar VARCHAR(255),
    isAdmin INT(1),
);



-- ----------------------------------------------------

-- ALTER TABLE `Composition`
-- ADD CONSTRAINT `compositionOrgan` FOREIGN KEY (`idOrgan`) REFERENCES `Organs` (`idOrgan`) ON DELETE CASCADE,
-- ADD CONSTRAINT `compositionOrganJeu` FOREIGN KEY (`idJeu`) REFERENCES `Organ_Jeux` (`idJeu`) ON DELETE CASCADE,
-- ADD CONSTRAINT `compositionOrganCategory` FOREIGN KEY (`idCategory`) REFERENCES `Organ_Categories` (`idCategory`) ON DELETE CASCADE;

-- ALTER TABLE `Images_Organs`
-- ADD CONSTRAINT `ImagesOrganOrgan` FOREIGN KEY (`idOrgan`) REFERENCES `Organs` (`idOrgan`) ON DELETE CASCADE;

-- ALTER TABLE `Organs`
-- ADD CONSTRAINT `organChurches` FOREIGN KEY (`idChurch`) REFERENCES `Churches` (`idChurch`) ON DELETE CASCADE;

-- ALTER TABLE `Events`
-- ADD CONSTRAINT `eventsIcon` FOREIGN KEY (`idIcon`) REFERENCES `Icons_Events` (`idIcon`) ON DELETE CASCADE,
-- ADD CONSTRAINT `eventChurches` FOREIGN KEY (`idChurch`) REFERENCES `Churches` (`idChurch`) ON DELETE CASCADE;

-- ALTER TABLE `Churches`
-- ADD CONSTRAINT `churchesCity` FOREIGN KEY (`idCity`) REFERENCES `Cities` (`idCity`) ON DELETE CASCADE;

-- ALTER TABLE `Sources`
-- ADD CONSTRAINT `sourcesChurch` FOREIGN KEY (`idChurch`) REFERENCES `Churches` (`idChurch`) ON DELETE CASCADE;

-- ALTER TABLE `Counties`
-- ADD CONSTRAINT `departementCounties` FOREIGN KEY (`idDepartment`) REFERENCES `Departments` (`idDepartment`) ON DELETE CASCADE;

-- ALTER TABLE `Cities`
-- ADD CONSTRAINT `citiesCounty` FOREIGN KEY (`idCounty`) REFERENCES `Counties` (`idCounty`) ON DELETE CASCADE;
