-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mar 27 Septembre 2016 à 23:07
-- Version du serveur :  5.5.42
-- Version de PHP :  7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `DrakMovies`
--

-- --------------------------------------------------------

--
-- Structure de la table `acteur`
--

CREATE TABLE `acteur` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dateNaissance` date NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nationalite` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `biographie` longtext COLLATE utf8_unicode_ci,
  `creation_timestamp` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `acteur`
--

INSERT INTO `acteur` (`id`, `nom`, `prenom`, `dateNaissance`, `image`, `nationalite`, `biographie`, `creation_timestamp`) VALUES
(2, 'Hawke', 'Ethan', '1970-11-07', 'hawke.jpg', 'U.S.A.', 'En 1985, alors âgé de quatorze ans, il fait ses débuts au cinéma, dans le film de science-fiction Explorers de Joe Dante qu''il a tourné avec River Phoenix. Quatre ans plus tard, soit en 1989, il devient une vedette grâce au film Le Cercle des poètes disparus (Dead Poets Society), où il incarne Todd Anderson l''un des élèves de Robin Williams. Todd est le timide qui se lie d''amitié avec le rebelle Niel Perry (Robert Sean Leonard) et les deux adolescents resteront amis et fonderont une compagnie théâtrale La Malaparte.\r\n\r\nEthan Hawke est présent sur les planches de Broadway depuis cette époque et a reçu de nombreux prix pour ses interprétations et ses mises en scène.\r\n\r\nEthan Hawke est habitué aux rôles de jeune premier. Il alterne les genres cinématographiques : cela va du film d''aventure ou dramatique (Croc-Blanc de Randal Kleiser, Les Survivants de Frank Marshall) à la romance (De grandes espérances d''Alfonso Cuarón, de même que la trilogie Before Sunrise, Before Sunset et Before Midnight de Richard Linklater où il donne la réplique à Julie Delpy), en passant par la science-fiction (Bienvenue à Gattaca, dont il partage l''affiche avec sa compagne d''alors Uma Thurman).\r\n\r\nEn 2000, il incarne un Hamlet contemporain.\r\n\r\nEn 2001, il réalise son premier long métrage, Chelsea Walls adapté d''une pièce de théâtre. Mais ensuite, l''acteur revient vers des projets hollywoodiens plus « classiques » : le thriller Taking lives, destins violés (2004), où il donne la réplique à Angelina Jolie, ou encore le film d''action Assaut sur le central 13 (2005), remake du Assaut de John Carpenter.\r\n\r\nParallèlement à sa carrière d''acteur, il a écrit deux romans : The Hottest State (1996), sorti en France sous le titre Manhattan story en 2003 et dont il réalisera une adaptation réussie au cinéma ; et Ash Wednesday (2002), qui n''a actuellement pas donné lieu à une édition en langue française.\r\nIl a deux enfants avec l''actrice Uma Thurman, rencontrée sur le tournage du film Bienvenue à Gattaca : Maya Ray, née le 8 juillet 1998, et Levon Roan, né le 15 janvier 2002. Le couple divorce en 2003.\r\n\r\nEthan Hawke et sa seconde femme, Ryan Shawhughes, sont les parents de Clementine Jane, née à New York le 18 juillet 2007 et Indiana née le 6 août 2011. Ryan était à l''époque la nounou des deux enfants qu''Ethan a eus avec Uma Thurman.', '0000-00-00 00:00:00'),
(3, 'Nolte', 'Nick', '1941-02-08', 'nolte.jpg', 'U.S.A.', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias', '0000-00-00 00:00:00'),
(4, 'Goldblum', 'Jeff', '1952-10-22', 'goldblum.jpg', 'U.S.A.', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias', '0000-00-00 00:00:00'),
(5, 'Fassbender', 'Michael', '1977-04-02', 'fassbender.jpg', 'Irlande', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias', '0000-00-00 00:00:00'),
(6, 'Murphy', 'Cillian', '1976-05-25', 'murphy.jpg', 'Irlande', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias', '0000-00-00 00:00:00'),
(7, 'McAvoy', 'James', '1979-04-21', 'mcavoy.jpg', 'Ecosse', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias', '0000-00-00 00:00:00'),
(8, 'Schwarzenegger', 'Arnold', '1947-07-30', 'schwarzenegger.jpg', 'Autriche', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias', '0000-00-00 00:00:00'),
(9, 'Connelly', 'Jennifer', '1970-12-12', '57275d4e977aa7.06677799-Connelly.jpeg', 'U.S.A.', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias', '0000-00-00 00:00:00'),
(10, 'Palminteri', 'Chazz', '1952-05-15', 'palminteri.jpg', 'U.S.A.', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias', '0000-00-00 00:00:00'),
(11, 'Malkovich', 'John', '1953-12-09', 'malkovich.jpg', 'U.S.A.', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias', '0000-00-00 00:00:00'),
(12, 'Reilly', 'Kelly', '1977-07-18', 'reilly.jpg', 'Angleterre', NULL, '0000-00-00 00:00:00'),
(13, 'Lee', 'Brandon', '1965-02-01', 'Brandon-Lee-mort-par-balle.jpg', 'U.S.A.', NULL, '0000-00-00 00:00:00'),
(14, 'Ford', 'Harrison', '1942-07-13', 'ford.jpg', 'U.S.A.', NULL, '0000-00-00 00:00:00'),
(15, 'Hardy', 'Tom', '1977-09-15', 'hardy.jpg', 'Angleterre', NULL, '0000-00-00 00:00:00'),
(22, 'Olsen', 'Elizabeth', '1989-02-16', '57272bd9a757b1.51236515-Olsen.jpeg', 'U.S.A.', NULL, '0000-00-00 00:00:00'),
(23, 'Evans', 'Chris', '1981-06-13', '57272c477c5af0.87741798-Evans.jpeg', 'U.S.A.', NULL, '0000-00-00 00:00:00'),
(24, 'Kitano', 'Takeshi', '1947-01-18', '57272c9dcdace8.57552932-Kitano.jpeg', 'Japon', NULL, '2016-05-02 00:00:00'),
(25, 'Byrne', 'Gabriel', '1950-05-12', '57272d83726c11.90792256-Byrne.jpeg', 'Irlande', NULL, '2016-05-01 00:00:00'),
(26, 'Law', 'Jude', '1972-12-29', '57272e584ae5b6.34122445-Law.jpeg', 'Angleterre', NULL, '2016-04-29 00:00:00'),
(27, 'Thurman', 'Uma', '1970-04-29', '57272e9c32e980.23059418-Thurman.jpeg', 'U.S.A.', NULL, '2016-04-28 00:00:00'),
(30, 'Ziyi', 'Zhang', '1979-02-09', '572748eb5c32e5.92124957-Ziyi.jpeg', 'Chine', NULL, '2016-04-26 00:00:00'),
(31, 'Van Damme', 'Jean-Claude', '1960-10-18', '5728886c4de5e2.53359282-Van Damme.jpeg', 'Belgique', NULL, '2016-05-03 13:15:56'),
(32, 'De Niro', 'Robert', '1943-08-17', '57289cd0a9a898.16398801-De Niro.jpeg', 'U.S.A.', NULL, '2016-05-03 14:42:56'),
(33, 'Rourke', 'Mickey', '1952-09-16', '57289d1120fd86.42386541-Rourke.jpeg', 'U.S.A.', NULL, '2016-05-03 14:44:01'),
(34, 'Shibasaki', 'Kô', '1981-08-05', '57289e782703b9.69707228-Shibasaki.jpeg', 'Japon', NULL, '2016-05-03 14:50:00'),
(35, 'Stamp', 'Terence', '1939-07-22', '5729bfb9c4ce83.85417797-Stamp.jpeg', 'Angleterre', NULL, '2016-05-04 11:24:09'),
(36, 'Gosling', 'Ryan', '1980-11-12', '5730602031dda6.63150526-Gosling.jpeg', 'Canada', NULL, '2016-05-09 12:02:08');

-- --------------------------------------------------------

--
-- Structure de la table `acteur_film`
--

CREATE TABLE `acteur_film` (
  `id_acteur` int(11) NOT NULL,
  `id_film` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `acteur_film`
--

INSERT INTO `acteur_film` (`id_acteur`, `id_film`) VALUES
(2, 42),
(3, 40),
(4, 54),
(4, 67),
(5, 44),
(5, 57),
(6, 48),
(7, 44),
(8, 38),
(8, 60),
(9, 40),
(10, 40),
(11, 40),
(12, 57),
(13, 61),
(14, 59),
(15, 62),
(22, 55),
(23, 55),
(24, 74),
(25, 54),
(26, 42),
(27, 42),
(30, 73),
(31, 72),
(32, 71),
(33, 71),
(34, 74),
(35, 76),
(36, 69);

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `affiche` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dateSortie` datetime NOT NULL,
  `numVisa` bigint(20) DEFAULT NULL,
  `duree` decimal(10,0) NOT NULL,
  `pays` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `noteSpectateur` int(11) DEFAULT NULL,
  `censure` int(11) DEFAULT NULL,
  `aLaffiche` tinyint(1) DEFAULT NULL,
  `synopsis` longtext COLLATE utf8_unicode_ci NOT NULL,
  `director` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `boxOfficeFrance` bigint(20) NOT NULL,
  `budget` bigint(20) NOT NULL,
  `trailer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `genre_id` int(11) DEFAULT NULL,
  `date_updated` datetime NOT NULL,
  `creation_timestamp` datetime NOT NULL,
  `frontThumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reviewN6tyrell` longtext COLLATE utf8_unicode_ci NOT NULL,
  `reviewN6marzoni` longtext COLLATE utf8_unicode_ci NOT NULL,
  `reviewN6palm` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `film`
--

INSERT INTO `film` (`id`, `affiche`, `nom`, `dateSortie`, `numVisa`, `duree`, `pays`, `noteSpectateur`, `censure`, `aLaffiche`, `synopsis`, `director`, `boxOfficeFrance`, `budget`, `trailer`, `genre_id`, `date_updated`, `creation_timestamp`, `frontThumbnail`, `reviewN6tyrell`, `reviewN6marzoni`, `reviewN6palm`) VALUES
(38, 'running.jpg', 'Running Man', '1988-03-16 00:00:00', 15864531351544, '101', 'U.S.A.', 4, NULL, NULL, 'Set in a totalitarian society. Ben Richards is a cop who was blamed for a massacre which wasn''t his fault. He would be sent to prison and breaks out with some other inmates. He tries to escape but the woman whom he dragged into his plan turns him over to the authorities. Damon Killian, who is the host of THE RUNNING MAN a game show wherein convicted felons are given the chance to run to freedom but have to elude the stalkers; men who hunt them down and kill them in gruesome manners. When he learns that Richards has been caught, he wants him to be the show''s next contestant. After being brought to Killian, Richards turns him down, Killian then reveals to Richards that his two friends who were in prison with him and who broke out with him have been caught, so unless Richards does the show they will. But on the night of the show, Richards is set to go but Killian also reveals that Richards'' two friends are going with him. Richards tells Killian that he will be back. But first !', 'Paul Michael Glaser', 817198, 27000000, '-ceegnWSENQ', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '', '', ''),
(39, '57233f8192c734.13207677-Cannibal Holocaust.jpeg', 'Cannibal Holocaust', '1981-04-22 00:00:00', 456913515387411, '95', 'Italie', 5, NULL, NULL, 'A New York anthropologist named Professor Harold Monroe travels to the wild, inhospitable jungles of South America to find out what happened to a documentary film crew that disappeared two months before while filming a documentary about primitive cannibal tribes deep in the rain forest. With the help of two local guides, Professor Monroe encounters two tribes, the Yacumo and the Yanomamo. While under the hospitality of the latter tribe, he finds the remains of the crew and several reels of their undeveloped film. Upon returning to New York City, Professor Monroe views the film in detail, featuring the director Alan Yates, his girlfriend Faye Daniels, and cameramen Jack Anders and Mark Tomaso. After a few days of traveling, the film details how the crew staged all the footage for their documentary by terrorizing and torturing the natives. Despite Monroe''s objections, the television studio Pan American still wishes to air the footage as a legitimate documentary. In order to change their...', 'Ruggero Deodato', 645841, 100000, 'cZ-Xp6VC7RQ', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '', '', ''),
(40, 'mulholland.jpg', 'Mulholland Falls', '1996-09-04 00:00:00', 15864531351228, '107', 'U.S.A.', 5, NULL, NULL, 'This film is about the adventures of a 1940''s special anti-gangster police squad in Los Angeles, the infamous ''Hat Squad.'' The four members of this squad are big, tough, no-nonsense cops who don''t hesitate to break the law, if it suits their purposes. When a local woman is murdered, their investigation turns up the fact that she had been romantically linked to several prominent men and had secret films taken of her liaisons. Since one of those men is the powerful U.S. Army General at the head of the then-new Atomic Energy Commission and another is the (married) leader of the Hat Squad, complications ensue. The FBI even gets involved in an attempted cover-up.', 'Lee Tamahori', 86306, 30000000, 'AeDUBK-Sc_4', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '', '', ''),
(42, 'gattaca.jpg', 'Gattaca', '1997-04-29 00:00:00', 158641233333999, '106', 'U.S.A.', 4, NULL, NULL, 'In the not-too-distant future, a less-than-perfect man wants to travel to the stars. Society has categorized Vincent Freeman as less than suitable given his genetic make-up and he has become one of the underclass of humans that are only useful for menial jobs. To move ahead, he assumes the identity of Jerome Morrow, a perfect genetic specimen who is a paraplegic as a result of a car accident. With professional advice, Vincent learns to deceive DNA and urine sample testing. Just when he is finally scheduled for a space mission, his program director is killed and the police begin an investigation, jeopardizing his secret.', 'Andrew Niccol', 508865, 36000000, 'hWjlUj7Czlk', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '', '', ''),
(43, 'amelie.jpg', 'Le Fabuleux Destin d''Amélie Poulain', '2001-04-25 00:00:00', 954453121247888, '120', 'France', 3, NULL, NULL, 'Amélie is a story about a girl named Amélie whose childhood was suppressed by her Father''s mistaken concerns of a heart defect. With these concerns Amélie gets hardly any real life contact with other people. This leads Amélie to resort to her own fantastical world and dreams of love and beauty. She later on becomes a young woman and moves to the central part of Paris as a waitress. After finding a lost treasure belonging to the former occupant of her apartment, she decides to return it to him. After seeing his reaction and his new found perspective - she decides to devote her life to the people around her. Such as, her father who is obsessed with his garden-gnome, a failed writer, a hypochondriac, a man who stalks his ex girlfriends, the "ghost", a suppressed young soul, the love of her life and a man whose bones are as brittle as glass. But after consuming herself with these escapades - she finds out that she is disregarding her own life and damaging her quest for love. Amélie then...', 'Jean-Pierre Jeunet', 8516999, 11710000, 'B-uxeZaM-VM', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '', '', ''),
(44, 'x-men.jpg', 'X-men : Apocalypse', '2016-05-18 00:00:00', 749881341511355, '147', 'U.S.A.', 0, NULL, NULL, 'Since the dawn of civilization, he was worshiped as a god. Apocalypse, the first and most powerful mutant from Marvel''s X-Men universe, amassed the powers of many other mutants, becoming immortal and invincible. Upon awakening after thousands of years, he is disillusioned with the world as he finds it and recruits a team of powerful mutants, including a disheartened Magneto, to cleanse mankind and create a new world order, over which he will reign. As the fate of the Earth hangs in the balance, Raven with the help of Professor X must lead a team of young X-Men to stop their greatest nemesis and save mankind from complete destruction.', 'Bryan Singer', 0, 240000000, 'PfBVIHgQbYk', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '', '', ''),
(45, 'eva.jpg', 'Eva', '2012-03-21 00:00:00', 2654161481614, '94', 'Espagne', 4, NULL, NULL, 'Set in 2041, Alex Garel is a well-known robot programmer who after 10 years returns to his home town to work in his old university when his friend Julia brings him a project to create a new line of robot child. There Alex meets his brother David, Lana (Alex''s former lover and David''s current wife), and Eva, Alex''s 10-years-old niece. Looking for inspiration, Alex asks Eva to be the muse of the new robot, watching her attitude and behavior during the time they spend together, making emotional tests to configure its personality. The relationship with his niece gives Alex doubts about finishing the project and awakens old feelings for Lana. At the same time he starts suspecting that perhaps the lovely and imaginative Eva is hiding an important secret about Lana and herself.', 'Kike Maillo', 30045, 7000000, 'EkKBZ4w_w20', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '', '', ''),
(46, 'two-sisters.jpg', 'A Tale of Two Sisters', '2004-06-16 00:00:00', 65516438513513, '119', 'Corée du Sud', 4, NULL, NULL, 'Two sisters who, after spending time in a mental institution, return to the home of their father and cruel stepmother. Once there, in addition to dealing with their stepmother''s obsessive and unbalanced ways, an interfering ghost also affects their recovery.', 'Kim Jee-woon', 69346, 3700000, 'LvQDjDEn65o', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '', '', ''),
(47, 'diewelle.jpg', 'Die Welle', '2009-03-04 00:00:00', 3125841564864, '108', 'Allemagne', 3, NULL, NULL, 'High school teacher, Rainer Wegner, may be popular with the students, but he''s also unorthodox. He''s forced to teach autocracy for the school''s project week. He''s less than enthusiastic at first, but the response of the students is surprising to say the least. He forces the students to become more invested in the prospect of self rule, and soon the class project has its own power and eerily starts to resemble Germany''s past. Can Wegner and his class realize what''s happening before the horrors start repeating themselves?', 'Dennis Gansel', 299546, 5000000, 'qkztDM5ukbw', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '', '', ''),
(48, '28-days.jpg', '28 Days Later...', '2003-05-28 00:00:00', 534831385418, '112', 'Angleterre', 4, NULL, NULL, 'Animal activists invade a laboratory with the intention of releasing chimpanzees that are undergoing experimentation, infected by a virus -a virus that causes rage. The naive activists ignore the pleas of a scientist to keep the cages locked, with disastrous results. Twenty-eight days later, our protagonist, Jim, wakes up from a coma, alone, in an abandoned hospital. He begins to seek out anyone else to find London is deserted, apparently without a living soul. After finding a church, which had become inhabited by zombie like humans intent on his demise, he runs for his life. Selena and Mark rescue him from the horde and bring him up to date on the mass carnage and horror as all of London tore itself apart. This is a tale of survival and ultimately, heroics, with nice subtext about mankind''s savage nature.', 'Danny Boyle', 197015, 8000000, 'Jck5mb9lt54', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '', '', ''),
(49, 'ring.jpg', 'Ringu', '2001-04-11 00:00:00', 185643131321, '98', 'Japon', 4, NULL, NULL, 'Reiko Asakawa is researching into a ''Cursed Video'' interviewing teenagers about it. When her niece Tomoko dies of ''sudden heart failure'' with an unnaturally horrified expression on her face, Reiko investigates. She finds out that some of Tomoko''s friends, who had been on a holiday with Tomoko the week before, had died on exactly the same night at the exact same time in the exact same way. Reiko goes to the cabin where the teens had stayed and finds an ''unlabeled'' video tape. Reiko watched the tape to discover to her horror it is in fact the ''cursed videotape''. Ex-Husband Ryuji helps Reiko solve the mystery, Reiko makes him a copy for further investigation. Things become more tense when their son Yoichi watches the tape saying Tomoko had told him to. Their discovery takes them to a volcanic island where they discover that the video has a connection to a psychic who died 30 years ago, and her child Sadako...', 'Hideo Nakata', 94172, 1200000, 'N4x421eqlwQ', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '', '', ''),
(50, 'livide.jpg', 'Livide', '2011-12-07 00:00:00', 93451541841584, '91', 'France', 3, NULL, NULL, 'It''s young Lucy''s first day as a trainee in-house caregiver. She visits Mrs Jessel, an old woman who lies in cerebral coma, by herself, in her large desolate house. Learning by accident that Mrs Jessel, a former dance teacher of repute, supposedly possesses a treasure somewhere in the house, Lucy and friends William and Ben decide to search the house in the hope of finding it. At night, they get into the house, which reveals itself to be increasingly peculiar. Their hunt for Mrs Jessel''s treasure leads them into a horrifying supernatural series of events that will change Lucy forever...', 'Julien Maury et Alexandre Bustillo', 5101, 4000000, 'Q8LAG5Ass9E', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '', '', ''),
(51, 'cube.jpg', 'Cube', '1997-04-28 00:00:00', 348161864648, '86', 'Canada', 3, NULL, NULL, 'Six different people, each from a very different walk of life, awaken to find themselves inside a giant cube with thousands of possible rooms. Each has a skill that becomes clear when they must band together to get out: a cop, a math whiz, a building designer, a doctor, an escape master, and a disabled man. Each plays a part in their thrilling quest to find answers as to why they''ve been imprisoned.', 'Vincenzo Natali', 910748, 350000, 'YAWSkYqqkMA', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '', '', ''),
(53, 'descent.jpg', 'The Descent', '2005-10-12 00:00:00', 343154183564583, '109', 'Angleterre', 4, NULL, NULL, 'A woman goes on vacation with her friends after her husband and daughter encounter a tragic accident. One year later she goes hiking with her friends and they get trapped in the cave. With a lack of supply, they struggle to survive and they meet strange blood thirsty creatures.', 'Neil Marshall', 380727, 50000000, 'CSYg7Z1KS_I', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '', '', ''),
(54, 'maddog.jpg', 'Mad Dog Time', '1997-07-23 00:00:00', 6958168543136, '92', 'U.S.A.', 4, NULL, NULL, 'Mob boss Vic returns to business from madhouse. Meanwhile his best and quickest assistant Mickey Holliday is having an affair with Vic''s girl Grace Everly and, at the same time, with her sister Rita Everly. What will Vic do? Whom will he kill? Is he really insane and weak? Many other mobsters, including Jake Parker, WackyJacky Jackson and Ben London think he''s not so powerful anymore and hope to take his place.', 'Larry Bishop', 77017, 8000000, 'o6bU_lmd-qM', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '', '', ''),
(55, '571a3babf101d3.43066559civilwar.jpg', 'Captain America : Civil War', '2016-04-27 00:00:00', 861181481615414, '148', 'U.S.A.', 3, NULL, NULL, 'After another incident involving the Avengers results in collateral damage, political pressure mounts to install a system of accountability, headed by a governing body to oversee and direct the team. The new status quo fractures the Avengers, resulting in two camps, one led by Steve Rogers and his desire for the Avengers to remain free to defend humanity without government interference, and the other following Tony Stark''s surprising decision to support government oversight and accountability.', 'Anthony Russo et Joe Russo', 0, 300000000, 'dKrVegVI0Us', 7, '2016-05-02 09:42:33', '0000-00-00 00:00:00', NULL, '', '', ''),
(57, '571f30e67d2704.29856351edenlake.jpg', 'Eden Lake', '2008-10-08 00:00:00', 915861453135, '90', 'Angleterre', 4, NULL, NULL, 'Nursery teacher Jenny and her boyfriend Steve, escape for a romantic weekend away. Steve, planning to propose, has found an idyllic setting: a remote lake enclosed by woodlands and seemingly deserted. The couple''s peace is shattered when a gang of obnoxious kids encircles their campsite. Reveling in provoking the adults, the gang steals the couple''s belongings and vandalizes their car leaving them completely stranded. When Steve confronts them, tempers flare and he suffers a shocking and violent attack. Fleeing for help, Jenny is subject to a brutal and relentless game of cat-and-mouse as she desperately tries to evade her young pursuers and find her way out of the woods.', 'James Watkins', 87202, 2000000, '4g1wYEAWOrs', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '', '', ''),
(59, '571fc65a2d4614.9347036337847_blade_runner_poster.jpg', 'Blade Runner', '1982-09-15 00:00:00', 6957157951519, '117', 'U.S.A.', 5, NULL, NULL, 'In the futuristic year of 2019, Los Angeles has become a dark and depressing metropolis, filled with urban decay. Rick Deckard, an ex-cop, is a "Blade Runner". Blade runners are people assigned to assassinate "replicants". The replicants are androids that look like real human beings. When four replicants commit a bloody mutiny on the Off World colony, Deckard is called out of retirement to track down the androids. As he tracks the replicants, eliminating them one by one, he soon comes across another replicant, Rachel, who evokes human emotion, despite the fact that she''s a replicant herself. As Deckard closes in on the leader of the replicant group, his true hatred toward artificial intelligence makes him question his own identity in this future world, including what''s human and what''s not human.', 'Ridley Scott', 2132201, 28000000, '6Ilbh612RUc', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '', '', ''),
(60, '571fc94a34c464.39505167conan-the-barbarian-53a4ab95e17a7.jpg', 'Conan The Barbarian', '1982-04-07 00:00:00', 89657954646443, '129', 'U.S.A.', 4, NULL, NULL, 'A village is attacked by the evil ruler of the Snake Cult, Thulsa Doom (James Earl Jones) and his evil warriors, when Thulsa Doom and his warriors kills his parents, a young boy named Conan (Jorge Sanz) is enslaved. Years later, Conan grows up and becomes a mighty warrior and is trained as a fighter. After years as a slave and as a gladiator, Conan is set free. Conan sets out on a quest as he vows to avenge his parents and solve the riddle of steel. Joined by a archer named Subotai (Gerry Lopez), a beautiful thief who falls in love with Conan, Valeria (sandahl Bergman'') and a Chinese wizard (Mako), Conan and his companions sets out to rescue Princess Yasmina (Valérie Quennessen), daughter of King Osric (Max von Sydow), from the Snake Cult, and get his revenge on Thulsa Doom and avenge his parents.', 'John Milius', 1778722, 20000000, 'iwYQeCHJT5w', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '', '', ''),
(61, '571fcc07dfbe56.38132212the-crow.jpg', 'The Crow', '1997-08-03 00:00:00', 48419520606112, '101', 'U.S.A.', 5, NULL, NULL, 'A poetic guitarist Eric Draven is brought back to life by a crow a year after he and his fiancée are murdered. The crow guides him through the land of the living, and leads him to his killers: knife thrower Tin-tin, drugetic Funboy, car buff T-Bird, and the unsophisticated Skank. One by one, Eric gives these thugs a taste of their own medicine. However their leader Top-Dollar, a world-class crime lord who will dispatch his enemies with a Japanese sword and joke about it later, will soon learn the legend of the crow and the secret to the vigilante''s invincibility.', 'Alex Proyas', 854986, 15000000, 'rEfMQKaAhfs', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '', '', ''),
(62, '57209c82228587.88859258madmaxfr.jpg', 'Mad Max : Fury Road', '2015-05-14 00:00:00', 1534581341813, '120', 'U.S.A.', 4, NULL, NULL, 'An apocalyptic story set in the furthest reaches of our planet, in a stark desert landscape where humanity is broken, and almost everyone is crazed fighting for the necessities of life. Within this world exist two rebels on the run who just might be able to restore order. There''s Max, a man of action and a man of few words, who seeks peace of mind following the loss of his wife and child in the aftermath of the chaos. And Furiosa, a woman of action and a woman who believes her path to survival may be achieved if she can make it across the desert back to her childhood homeland.', 'George Miller', 2356085, 150000000, 'hEJnMQG9ev8', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '', '', ''),
(64, '57225ea7592106.68125382Mononoke-hime_poster_goldposter_com_12.jpg', 'Mononoke-Hime', '2000-01-12 00:00:00', 1864864684684, '135', 'Japon', 3, NULL, NULL, 'While protecting his village from rampaging boar-god/demon, a confident young warrior, Ashitaka, is stricken by a deadly curse. To save his life, he must journey to the forests of the west. Once there, he''s embroiled in a fierce campaign that humans were waging on the forest. The ambitious Lady Eboshi and her loyal clan use their guns against the gods of the forest and a brave young woman, Princess Mononoke, who was raised by a wolf-god. Ashitaka sees the good in both sides and tries to stem the flood of blood. This is met be animosity by both sides as they each see him as supporting the enemy.', 'Hayao Miyazaki', 959845, 21000, '4OiMOHRDs14', 12, '2016-04-29 16:59:56', '0000-00-00 00:00:00', NULL, '', '', ''),
(66, '5723766d85d7e8.07423134-Schindler''s List.jpeg', 'Schindler''s List', '1994-03-02 00:00:00', 18964186165816, '195', 'U.S.A.', 5, NULL, NULL, 'Oskar Schindler is a vainglorious and greedy German businessman who becomes an unlikely humanitarian amid the barbaric Nazi reign when he feels compelled to turn his factory into a refuge for Jews. Based on the true story of Oskar Schindler who managed to save about 1100 Jews from being gassed at the Auschwitz concentration camp, it is a testament to the good in all of us.', 'Steven Spielberg', 2651078, 25000000, 'JdRGC-w9syA', 6, '2016-04-29 16:57:52', '0000-00-00 00:00:00', NULL, '', '', ''),
(67, '57237894e82b31.16698848-The Fly.jpeg', 'The Fly', '1987-01-21 00:00:00', 8648164364611, '106', 'U.S.A.', 4, NULL, NULL, 'Seth Brundle, a brilliant but eccentric scientist attempts to woo investigative journalist Veronica Quaife by offering her a scoop on his latest research in the field of matter transportation, which against all the expectations of the scientific establishment have proved successful. Up to a point. Brundle thinks he has ironed out the last problem when he successfully transports a living creature, but when he attempts to teleport himself a fly enters one of the transmission booths, and Brundle finds he is a changed man.', 'David Cronenberg', 2165297, 15000000, 'hMc9EdQ52-w', 1, '2016-04-29 17:07:01', '0000-00-00 00:00:00', NULL, '', '', ''),
(69, '57237fbc7532f2.27877395-The Notebook.jpeg', 'The Notebook', '2004-12-08 00:00:00', 8148641861811, '121', 'U.S.A.', 3, NULL, NULL, 'In a nursing home, resident Duke reads a romance story for an old woman who has senile dementia with memory loss. In the late 1930s, wealthy seventeen year-old Allie Hamilton is spending summer vacation in Seabrook. Local worker Noah Calhoun meets Allie at a carnival and they soon fall in love with each other. One day, Noah brings Allie to an ancient house that he dreams of buying and restoring and they attempt to make love but get interrupted by their friend. Allie''s parents do not approve of their romance since Noah belongs to another social class, and they move to New York with her. Noah writes 365 letters (A Year) to Allie, but her mother Anne Hamilton does not deliver them to her daughter. Three years later, the United States joins the World War II and Noah and his best friend Fin enlist in the army, and Allie works as an army nurse. She meets injured soldier Lon Hammond in the hospital. After the war, they meet each other again going on dates and then, Lon, who is wealthy and ...', 'Nick Cassavetes', 101194, 30000000, 'yDJIcYE32NU', 11, '2016-04-29 17:37:33', '2016-04-29 17:37:33', NULL, '', '', ''),
(70, '5727a4b53886a4.87548113-Soylent Green.jpeg', 'Soylent Green', '1974-06-26 00:00:00', NULL, '97', 'U.S.A.', 4, NULL, NULL, 'In 2022, Earth is overpopulated and totally polluted; the natural resources have been exhausted and the nourishment of the population is provided by Soylent Industries, a company that makes a food consisting of plankton from the oceans. In New York City, when Soylent''s member of the board William R. Simonson is murdered apparently by a burglar at the Chelsea Towers West where he lives, efficient Detective Thorn is assigned to investigate the case with his partner Solomon "Sol" Roth. Thorn comes to the fancy apartment and meets Simonson''s bodyguard Tab Fielding and the "furniture" (woman that is rented together with the flat) Shirl and the detective concludes that the executive was not victim of burglary but executed. Further, he finds that the Governor Santini and other powerful men want to disrupt and end Thorn''s investigation. But Thorn continues his work and discovers a bizarre and disturbing secret of the ingredient used to manufacture Soylent Green.', 'Richard Fleischer', 2284681, 0, 'LozJSTjrvek', 9, '2016-05-02 21:26:00', '2016-05-02 21:04:23', NULL, '', '', ''),
(71, '5727a9aa201010.79589843-Angel Heart.jpeg', 'Angel Heart', '1987-04-08 00:00:00', NULL, '115', 'U.S.A.', 4, NULL, NULL, 'Harry Angel has a new case, to find a man called Johnny Favourite. Except things aren''t quite that simple and Johnny doesn''t want to be found. Let''s just say that amongst the period detail and beautiful scenery, it all gets really really nasty.', 'Alan Parker', 1340804, 17000000, 'U_jGCXRx2mk', 5, '2016-05-02 21:25:30', '2016-05-02 21:25:30', NULL, '', '', ''),
(72, '5727ab7ab8ce83.45005934-Kickboxer.jpeg', 'Kickboxer', '1988-06-05 00:00:00', NULL, '105', 'U.S.A.', 4, NULL, NULL, 'Kurt Sloan is the corner-man for his brother, U.S. kickboxing champion Eric Sloan. When Kurt witnesses his brother become maliciously paralyzed in the ring by Thailand champion Tong Po, Kurt vows revenge. With the help of Zion, a kickboxing trainer who lives in a remote area of Thailand, Kurt trains for the fight of his life.', 'Mark DiSalle & David Worth', 911597, 1500000, 'e1vPYM1d3wo', 18, '2016-05-02 21:33:15', '2016-05-02 21:33:15', NULL, '', '', ''),
(73, '5727ac82861b72.25015874-Shi Mian Mai Fu.jpeg', 'Shi Mian Mai Fu', '2004-11-17 00:00:00', NULL, '119', 'Chine', 3, NULL, NULL, 'During the reign of the Tang dynasty in China, a secret organization called "The House of the Flying Daggers" rises and opposes the government. A police officer called Leo sends officer Jin to investigate a young dancer named Mei, claiming that she has ties to the "Flying Daggers". Leo arrests Mei, only to have Jin breaking her free in a plot to gain her trust and lead the police to the new leader of the secret organization. But things are far more complicated than they seem...', 'Zhang Yimou', 443359, 12000000, 'AaOO2oork7A', 18, '2016-05-02 21:37:39', '2016-05-02 21:37:39', NULL, '', '', ''),
(74, '5727adeb827b10.86016432-Batoru Rowaiaru.jpeg', 'Batoru Rowaiaru', '2001-11-21 00:00:00', NULL, '113', 'Japon', 4, NULL, NULL, 'Forty-two students, three days, one deserted Island: welcome to Battle Royale. A group of ninth-grade students from a Japanese high school have been forced by legislation to compete in a Battle Royale. The students are each given a bag with a randomly selected weapon and a few rations of food and water and sent off to kill each other in a no-holds-barred (with a few minor rules) game to the death, which means that the students have three days to kill each other until one survives--or they all die. The movie focuses on a few of the students and how they cope. Some decide to play the game like the psychotic Kiriyama or the sexual Mitsuko, while others like the heroes of the movie--Shuya, Noriko, and Kawada--are trying to find a way to get off the Island without violence. However, as the numbers dwell down lower and lower on an hourly basis, is there any way for Shuya and his classmates to survive?', 'Kinji Fukasaku', 113148, 4500000, 'XvP6rEGEWz0', 1, '2016-05-02 21:43:40', '2016-05-02 21:43:40', NULL, '', '', ''),
(75, '5729bc989cf520.92465997-The Time Machine.jpeg', 'The Time Machine', '1961-01-21 00:00:00', NULL, '103', 'U.S.A.', 4, NULL, NULL, 'On January 5, 1900, a disheveled looking H.G. Wells - George to his friends - arrives late to his own dinner party. He tells his guests of his travels in his time machine, the work about which his friends knew. They were also unbelieving, and skeptical of any practical use if it did indeed work. George knew that his machine was stationary in geographic position, but he did not account for changes in what happens over time to that location. He also learns that the machine is not impervious and he is not immune to those who do not understand him or the machine''s purpose. George tells his friends that he did not find the Utopian society he so wished had developed. He mentions specifically a civilization several thousand years into the future which consists of the subterranean morlocks and the surface dwelling eloi, who on first glance lead a carefree life. Despite all these issues, love can still bloom over the spread of millennia.', 'George Pal', 120000, 750000, 'AKP-WkcDT5s', 7, '2016-05-04 11:10:49', '2016-05-04 11:10:49', NULL, '', '', ''),
(76, '5729bea29e2a86.29298745-The Collector.jpeg', 'The Collector', '1965-06-17 00:00:00', NULL, '119', 'U.S.A.', 4, NULL, NULL, 'Freddie, a socially withdrawn bank clerk and butterfly collector, decides to expand to collecting human specimens. That''s where art student Miranda Grey comes in. Miranda matches wits with Freddie the icy psychopath.', 'William Wyler', 120000, 200000, 'NiFYFP5mJ0o', 5, '2016-05-04 11:19:31', '2016-05-04 11:19:31', NULL, '', '', ''),
(77, '57306b62d695f2.68207817-The Man From Earth.jpeg', 'The Man From Earth', '2007-11-13 00:00:00', NULL, '87', 'U.S.A.', 4, NULL, NULL, 'An impromptu goodbye party for Professor John Oldman becomes a mysterious interrogation after the retiring scholar reveals to his colleagues he has a longer and stranger past than they can imagine.', 'Richard Schenkman', 0, 200000, '9mOIxyRTY5I', 2, '2016-09-27 22:22:41', '2016-05-09 12:50:11', NULL, 'Trop bien ! \r\nEpsum factorial non deposit quid pro quo hic escorol. Olypian quarrels et gorilla congolium sic ad nauseum. Souvlaki ignitus carborundum e pluribus unum. Defacto lingo est igpay atinlay. Marquee selectus non provisio incongruous feline nolo contendre. Gratuitous octopus niacin, sodium glutimate. Quote meon an estimate et non interruptus stadium. \r\n\r\n\r\n\r\nSic tempus fugit esperanto hiccup estrogen. Glorious baklava ex librus hup hey ad infinitum. Non sequitur condominium facile et geranium incognito. Epsum factorial non deposit quid pro quo hic escorol. Marquee selectus non provisio incongruous feline nolo contendre Olypian quarrels et gorilla congolium sic ad nauseum. Souvlaki ignitus carborundum e pluribus unum.', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `couleur` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `genre`
--

INSERT INTO `genre` (`id`, `nom`, `couleur`) VALUES
(1, 'Horreur', '#000'),
(2, 'Science-Fiction', '#00008b'),
(5, 'Thriller', '#2f4f4f'),
(6, 'Drame', '#009acd'),
(7, 'Fantastique', '#ffd700'),
(8, 'Comédie', '#eeeee0'),
(9, 'Anticipation', '#bfefff'),
(10, 'Heroic Fantasy', '#8b0000'),
(11, 'Romance', '#eea9b8'),
(12, 'Anime', '#4169e1'),
(13, 'Policier', '#27408b'),
(14, 'Guerre', '#8b3626'),
(15, 'Western', '#54ff9f'),
(16, 'Musical', '#da70d6'),
(17, 'Biopic', '#8b475d'),
(18, 'Arts Martiaux', '#ff0000'),
(19, 'Documentaire', '#228b22');

-- --------------------------------------------------------

--
-- Structure de la table `realisateur`
--

CREATE TABLE `realisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dateDeNaissance` datetime NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateDeNaissance` date NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contribution` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `login`, `email`, `password`, `dateDeNaissance`, `phone`, `gender`, `image`, `contribution`, `user_role_id`) VALUES
(1, 'lanydrak', 'lanydrak@gmail.com', '$2y$13$37QldHvgDvLl25gviD/lc.2VEsmzskuKFh/aaC2mGoCp9I9yPme8e', '1980-09-18', '0612562798', 0, 'lanydrak.jpg', 'Administrateur', 3),
(3, 'mimi', 'edelaunay18@gmail.com', '$2y$13$37QldHvgDvLl25gviD/lc.2VEsmzskuKFh/aaC2mGoCp9I9yPme8e', '1982-03-18', '0677030842', 1, 'mimi.jpg', 'Rédactrice', 1),
(4, 'saadi', 'saadi@pokeporn.com', '$2y$13$37QldHvgDvLl25gviD/lc.2VEsmzskuKFh/aaC2mGoCp9I9yPme8e', '1984-01-01', '0644556677', 0, 'saadi.jpg', 'Orthophoniste', 1),
(15, 'JeanLouis', 'jl@gmail.com', '$2y$13$ZjxBdFmpX4tb0mOV6hVQIu9ui47k2Ef7TcvlG5QYRzBEPVWn1JblW', '1936-01-01', '101010101', 0, '5730647aba32b4.46946867-JeanLouis.jpeg', 'Emploi fictif', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `user_role`
--

INSERT INTO `user_role` (`id`, `nom`, `role`) VALUES
(1, 'Administrateur', 'ROLE_ADMIN'),
(2, 'Utilisateur', 'ROLE_USER'),
(3, 'L''élu tout puissant', 'ROLE_SUPERADMIN');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `acteur`
--
ALTER TABLE `acteur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `acteur_film`
--
ALTER TABLE `acteur_film`
  ADD PRIMARY KEY (`id_acteur`,`id_film`),
  ADD KEY `IDX_14B01103CCCD668F` (`id_acteur`),
  ADD KEY `IDX_14B01103964A220` (`id_film`);

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8244BE22EB6F1C62` (`numVisa`),
  ADD KEY `IDX_8244BE224296D31F` (`genre_id`);

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_835033F86C6E55B5` (`nom`);

--
-- Index pour la table `realisateur`
--
ALTER TABLE `realisateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649AA08CB10` (`login`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  ADD KEY `IDX_8D93D6498E0E3CA6` (`user_role_id`);

--
-- Index pour la table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `acteur`
--
ALTER TABLE `acteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT pour la table `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT pour la table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `realisateur`
--
ALTER TABLE `realisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `acteur_film`
--
ALTER TABLE `acteur_film`
  ADD CONSTRAINT `FK_14B01103964A220` FOREIGN KEY (`id_film`) REFERENCES `film` (`id`),
  ADD CONSTRAINT `FK_14B01103CCCD668F` FOREIGN KEY (`id_acteur`) REFERENCES `acteur` (`id`);

--
-- Contraintes pour la table `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `FK_8244BE224296D31F` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D6498E0E3CA6` FOREIGN KEY (`user_role_id`) REFERENCES `user_role` (`id`);
