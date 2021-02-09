@extends('layouts.app')

@section('head-title')
    {{__('translations.footer.cgu.head-title')}} - 
@endsection

@section('content')
    <div id="loading" class="container-fluid loader-container-fluid">
        <div id="loader" class="loader"></div>
    </div>

    <div id="is-load" class="is-load">
        <div class="formbox-deco"></div>

        <div class="container formbox-container">
            <h1 class="page-title page-title-white">Conditions générales</h1>
            <p class="page-intro page-intro-white">Nous vous invitons à lire attentivement nos conditions générales.</p>
          
            <div class="formbox-inner">
                <p>
                    Les présentes conditions générales s’appliquent dans le cadre de tout accord conclu entre MyCVMaking 
                    (Dénommée ci-dessous : « MyCVMaking », « mycvmaking.com, ou « nous ») et l’utilisateur/l’utilisatrice (Dénommé(e) ci-dessous 
                    « l’utilisateur/l’utilisatrice » ou « vous ») du service mycvmaking.com (Dénommé ci-dessous: « le service »).
                </p>
                <p>
                    L’utilisation de notre créateur de CV, mycvmaking.com (Dénommé ci-dessous: « le service ») implique le respect de certaines conditions. 
                    Ce chapitre a pour but de vous les décrire. L’utilisation du service par vos soins confirme automatiquement votre acceptation de celles-ci. 
                    mycvmaking.com vous est proposé par MyCVMaking.
                </p>

                <br>

                <h2>Article 1. Utilisation du service</h2>
                <p>
                    1.1. Moyennant un paiement, vous êtes autorisé(e) à procéder à l’utilisation du service dans le cadre de la création, du traitement, 
                    de l’exportation et du téléchargement des CV et des lettres de sollicitation. Vous êtes tenu(e) responsable de l’utilisation des outils 
                    et des fonctionnalités proposés par le service.
                </p>
                <p>
                    1.2. La rédaction de la première version de votre CV entraîne automatiquement la création d’un compte. Un courriel vous dévoile des données 
                    d’accès afin de pouvoir vous identifier et vous permettre de procéder à l’utilisation des fonctionnalités du service.
                </p>
                <p>
                    1.3. Votre compte permet d’enregistrer les différentes versions de votre CV, vos lettres de sollicitation ainsi que des données additionnelles. 
                    Votre connexion au service vous permet de les consulter à tout moment.
                </p>
                <p>
                    1.4. L’accès à votre compte doit être sécurisé par vos soins, par le biais d’une adresse e-mail et d’un mot de passe. Nous vous conseillons 
                    vivement de ne pas divulguer votre mot de passe à des tiers. mycvmaking.com se réserve le droit de pouvoir considérer que toutes les opérations 
                    effectuées au sein de votre compte, suite à la demande d’accès au moyen de votre adresse e-mail et de votre mot de passe, sont sujettes à votre gestion 
                    et à votre supervision. Vous êtes tenu(e) responsable pour toutes les opérations effectuées au sein de votre compte, hormis en cas de communication 
                    explicite à mycvmaking.com de la détention de votre mot de passe par un tiers.
                </p>

                <br>

                <h2>Article 2. Règles d’utilisation</h2>
                <p>
                    2.1. Chaque compte est personnel et ne peut être géré que par le détenteur de l’adresse e-mail associée au compte concerné. Nous formulons expressément 
                    l’interdiction de permettre l’accès à votre compte à des tierces personnes.
                </p>
                <p>
                    2.2. Nous nous réservons le droit d’interdire de procéder à l’utilisation du service à des fins d’actions qui entreraient en contradiction avec le règlement 
                    et l’application de la loi nationale ou internationale en vigueur. Cette clause fait référence, entre autres, à l’enregistrement ou à la diffusion d’informations 
                    qualifiées de diffamatoires, qui contiennent des écrits calomnieux ou racistes ou à l’envoi de messages indésirables par le biais du service mycvmaking.com.
                </p>
                <p>
                    2.3. En cas de réception d’une plainte, ou en cas de constat par mycvmaking.com d’une enfreinte de votre part à une ou plusieurs règles énoncées ci-dessus, 
                    nous nous réservons le droit de clôturer le compte d’utilisateur ou de bloquer intégralement l’accès du service, sans aucune restitution du montant payé.
                </p>
                <p>
                    2.4. Dans tous les cas où mycvmaking.com constaterait l’éventualité d’un problème, d’un dommage ou d’un danger imminent pour le bon fonctionnement des systèmes 
                    informatiques ou du réseau de mycvmaking.com ou de tiers, et/ou pour la prestation de service par le biais d’internet, en particulier par l’envoi indésirable 
                    de courriels ou d’autres données, la divulgation de données personnelles ou la diffusion de virus informatiques, chevaux de Troie (Trojans) et logiciels 
                    similaires, mycvmaking.com se réserve le droit de prendre toutes les dispositions qu’elle juge nécessaires et équitables dans le but d’écarter le danger en 
                    question ou de le prévenir.
                </p>
                <p>
                    2.5. mycvmaking.com se réserve le droit de porter plainte, à tout moment, en cas de constatation de faits délictueux. De même, mycvmaking.com se réserve le 
                    droit de divulguer le nom, l’adresse, l’adresse IP et d’autres données d’identification de tout utilisateur/toute utilisatrice à des tiers qui se 
                    plaindraient et constateraient l’enfreinte de l’utilisation de leurs droits ou des présentes conditions générales, dans tous les cas où la plausibilité 
                    de la plainte serait jugée acceptable, qu’il n’existe pas d’autres méthodes d’accès à ces données et que les tiers puissent justifier leur intérêt quant 
                    à l’obtention des données.
                </p>
                <p>
                    2.6 mycvmaking.com se réserve le droit de répercuter à l’utilisateur/l’utilisatrice du service en infraction les dommages subis suite à l’enfreinte des règles 
                    de conduite énoncées ci-dessus par l’utilisateur/l’utilisatrice. L’utilisateur/l’utilisatrice du service préserve mycvmaking.com de toutes les plaintes émanant 
                    de tiers, dans le cadre de l’introduction de ses informations transmises.
                </p>

                <br>
                
                <h2>Article 3. Entretien et disponibilité</h2>
                <p>
                    3.1. mycvmaking.com prend toutes les dispositions nécessaires pour garantir la disponibilité du service, mais ne peut cependant pas assurer une disponibilité à 
                    100%
                </p>
                <p>
                    3.2. mycvmaking.com entretient les services proposés de manière active. Les entretiens peuvent survenir à tout moment, annoncés ou à l’improviste, même dans 
                    le cas ou ceux-ci pourraient provoquer une disponibilité limitée.
                </p>
                <p>
                    3.3. mycvmaking.com se réserve le droit de modifier le service à tout moment, apprécie le feedback de l’utilisateur/l’utilisatrice mais se réserve le droit de 
                    déterminer personnellement les informations aptes à être divulguées sur le site internet.
                </p>

                <h2>Article 4. Propriété intellectuelle</h2>
                <p>
                    4.1. Le service, les sites internet, le logiciel y afférent et toutes les informations, les illustrations du/des site(s) internet, les modèles/la mise 
                    en page des CV et des lettres de sollicitation font partie intégrante de la propriété intellectuelle de mycvmaking.com. Les éléments énoncés ci-dessus 
                    ne peuvent en aucun cas être copiés ou être utilisés sans autorisation écrite explicite de mycvmaking.com, hormis dans tous les cas autorisés par la loi.
                </p>
                <p>
                    4.2. La mise en page du document final que l’utilisateur/l’utilisatrice peut télécharger par le biais du service fait partie intégrante de la propriété 
                    intellectuelle de mycvmaking.com, en vertu du paragraphe précédent. L’utilisateur/l’utilisatrice du service perçoit un droit d’utilisation limité de cette 
                    mise en page. Aucune autorisation expresse ne sera délivrée dans le cadre d’une utilisation différente du service, à l’exclusion de l’utilisation combinée
                    aux documents rédigés et proposés par les services de mycvmaking.com. Ce droit persistera même après la clôture du présent accord, y compris les conditions y 
                    afférentes.
                </p>
                <p>
                    4.3. Les informations publiées ou enregistrées par l’utilisateur/l’utilisatrice par le biais du créateur de CV, mycvmaking.com, à savoir le texte de son CV ou 
                    sa photo d’identité, font partie intégrante et restent la propriété de l’utilisateur. mycvmaking.com se réserve un droit d’utilisation limité dans le cadre du 
                    traitement de ces informations en vue de la prestation du service.
                </p>
                <p>
                    4.4. L’utilisateur/l’utilisatrice du service peut révoquer ce droit d’utilisation énoncé dans le paragraphe précédent, soit en exerçant son droit de 
                    suppression des données concernées, soit en mettant un terme à l’accord conclu.
                </p>
                <p>
                    4.5. Lorsqu’un utilisateur/une utilisatrice envoie des informations à l’attention de mycvmaking.com, par exemple du feedback concernant une erreur ou une 
                    suggestion relative à sa correction, il/elle confère automatiquement à celle-ci un droit d’utilisation illimité et éternel de ces informations dans le 
                    cadre des prestations de services de mycvmaking.com, à l’exception des informations qualifiées explicitement de nature confidentielle et transmises en cet 
                    état à mycvmaking.com. mycvmaking.com n’est pas tenue de verser de compensation au cas où mycvmaking.com déciderait d’intégrer la suggestion ou le feedback de 
                    l’utilisateur/l’utilisatrice sur son site internet.
                </p>
                <p>
                    4.6. Le créateur de CV, mycvmaking.com, ne prendra pas connaissance des données confidentielles que l’utilisateur/l’utilisatrice sauvegarderait ou diffuserait 
                    par le biais du service, hormis en cas de nécessité absolue dans le cadre d’une bonne exécution de la prestation de service, ou lorsque mycvmaking.com y soit 
                    tenue en vertu de toute disposition légale ou toute obligation judiciaire. mycvmaking.com prendra toutes les dispositions nécessaires pour limiter au maximum 
                    la transmission des données, dans la limite des ses compétences.
                </p>
                <p>
                    4.7. L’utilisateur/l’utilisatrice du service dispose d’un droit d’utilisation du service et des documents générés par le biais du service, par exemple un 
                    CV ou une lettre de sollicitation, et ce, durant toute la période de son affiliation. Au terme de la période de son affiliation, l’utilisateur/l’utilisatrice 
                    ne sera plus autorisé(e) à utiliser les lettres de sollicitation et/ou la mise en page des CV générés par ses soins. Ces documents ne pourront être utilisés 
                    par l’utilisateur/l’utilisatrice du service qu’après l’acquisition financière des droits de mycvmaking.com qui reposent sur ces documents.
                </p>

                <br>

                <h2>Article 5. Rétribution financière pour le service</h2>
                <p>
                    5.1. L’utilisation du service implique automatiquement le versement d’une rétribution financière à mycvmaking.com. Les coûts en vigueur figurent sur le site 
                    internet de mycvmaking.com. Les coûts afférents à l’utilisation du service doivent impérativement être versés à l’avance, dès l’introduction de la demande 
                    d’utilisation du service.
                </p>
                <p>
                    5.2 L’utilisation initiale du créateur de CV, mycvmaking.com, implique automatiquement l’obligation de souscrire un abonnement. La souscription de l’abonnement 
                    de l’utilisateur/l’utilisatrice implique automatiquement l’obligation de payer un coût mensuel. Le montant dû par l’utilisateur/l’utilisatrice fera l’objet 
                    d’un paiement anticipatif mensuel à compter de la fin du premier mois d’abonnement.
                </p>
                <p>
                    5.3. mycvmaking.com se réserve le droit de modifier les coûts notifiés dans l’article 5, paragraphe 1, à tout moment. mycvmaking.com garantit de communiquer toute 
                    modification de prix à l’utilisateur/l’utilisatrice du service dans le délai d’un (1) mois précédant la mise en vigueur de la modification des prix. En 
                    cas de désaccord de l’utilisateur/l’utilisatrice en matière de modification des prix, l’utilisateur/l’utilisatrice du service dispose d’un droit de 
                    résiliation de l’accord conclu jusqu’au moment de la mise en vigueur des prix actualisés.
                </p>
                <p>
                    5.4. Vu l’exécution immédiate de la prestation du service par mycvmaking.com, sollicitée de manière expresse par l’utilisateur/l’utilisatrice, aucun droit 
                    de réclamation de paiement ou aucune possibilité de recours aux articles de la loi relative à la Vente à distance ne seront permis à 
                    l’utilisateur/l’utilisatrice du service.
                </p>

                <br>
                
                <h2>Article 6. Modalités de paiement</h2>
                <p>
                    6.1. Le premier paiement peut être effectué par carte de crédit ou PayPal, conformément aux instructions de paiement figurant sur le site Web. 
                    Au bout de 7 jours, si l’abonnement est renouvelé, les frais d’abonnement seront débités de la carte de crédit ayant servi au premier paiement. 
                    Le compte peut toujours être annulé directement en se connectant à son compte et en résiliant ce dernier.
                </p>
                <p>
                    6.2. En cas de non-paiement à la date d’échéance, mycvmaking.com envoie un rappel de paiement pour inviter l’utilisateur/l’utilisatrice du service 
                    à s’acquitter du montant dû endéans un délai de 14 jours. Si l’utilisateur/l’utilisatrice du service ne respecte pas son obligation de paiement 
                    dans le délai stipulé par le rappel, il/elle est considéré(e) en défaut de plein droit, sans aucune obligation pour mycvmaking.com d’envoyer une 
                    mise en demeure supplémentaire. Dès lors, mycvmaking.com se réserve le droit de réclamer des coûts de rappel et de limiter ses prestations de service. 
                    Par exemple, en limitant l’accès à mycvmaking.com.
                </p>
                <p>
                    6.3. Dans le cas où mycvmaking.com ne pourrait pas prélever le montant dû et/ou dans le cas où l’utilisateur/l’utilisatrice du service ne paierait pas 
                    à la date d’échéance, l’utilisateur/l’utilisatrice du service est non seulement redevable du montant dû majoré des intérêts y afférents, mais aussi 
                    de l’indemnisation totale des coûts de recouvrement extrajudiciaires..
                </p>

                <h2>Article 7. Responsabilité</h2>
                <p>
                    7.1. Sauf disposition contraire de la loi, les dispositions de responsabilité énoncées ci-dessous prévalent en cas d’utilisation du service.
                </p>
                <p>
                    7.2. Hormis en cas de faute intentionnelle ou de négligence grave, la responsabilité de mycvmaking.com est limitée au remboursement du montant 
                    payé par l’utilisateur/l’utilisatrice du service pour les deux (2) mois précédant le moment de l’événement qui aurait provoqué d’éventuels dommages.
                </p>
                <p>
                    7.3. mycvmaking.com ne peut en aucun cas être tenue pour responsable des dommages indirects, des dommages consécutifs, de la perte de profits, des emplois 
                    manqués, des économies non réalisées et des dommages dus à la stagnation des affaires de l’entreprise.
                </p>
                <p>
                    7.4. En cas de force majeure, mycvmaking.com ne sera jamais tenue au remboursement des dommages subis par l’utilisateur/l’utilisatrice du service en raison 
                    des événements énoncés ci-dessus. Sont considérés, entre autres, comme cas de force majeure, outre ceux habituellement retenus par la jurisprudence : 
                    le mauvais fonctionnement et la panne du réseau internet ou de l’infrastructure des télécommunications, le mauvais fonctionnement ou les interruptions 
                    du réseau électrique, les rébellions intérieures, la mobilisation, la guerre, le blocage des moyens de transport, la grève, le lock-out, les troubles 
                    de l’activité de l’entreprise, la stagnation de l’approvisionnement, les incendies, les inondations et tous autres événements indépendants de la 
                    volonté expresse des parties empêchant l'exécution normale de l’utilisation et de la prestation du service.
                </p>

                <br>

                <h2>Article 8. Durée et résiliation de l’abonnement</h2>
                <p>
                    8.1. Le présent accord et l’abonnement de l’utilisateur/l’utilisatrice du service prennent vigueur dès la première utilisation du service par 
                    l’utilisateur/l’utilisatrice, telle que mentionnée dans l’Article 1 des présentes conditions générales.
                </p>
                <p>
                    8.2. L’utilisateur/l’utilisatrice du service peut, à tout moment, résilier l’abonnement par le biais de son compte ou en contactant le service clientèle. 
                    Afin d’éviter le renouvellement indésirable de l’abonnement, l’utilisateur/l’utilisatrice du service doit impérativement résilier l’abonnement dans son 
                    compte, au plus tard le jour précédant la nouvelle période d’abonnement.
                </p>
                <p>
                    8.3. En cas de résiliation de l’abonnement, aucun versement anticipatif perçu par mycvmaking.com ne sera remboursé à l’utilisateur/l’utilisatrice du service.
                </p>
                <p>
                    8.4. Les données sauvegardées par l’utilisateur/l’utilisatrice du service seront effacées après un délai de dix-huit mois à compter de la dernière date 
                    de l’utilisation du service. mycvmaking.com s’engage à informer l’utilisateur/l’utilisatrice du service, par courriel, avant la suppression des données, 
                    mais aucun devoir ne l’y oblige. L’utilisateur/l’utilisatrice du service aura toutefois la possibilité d’utiliser les données jusqu’au moment de leur 
                    suppression, en optant pour une nouvelle conclusion d’un accord.
                </p>

                <br>

                <h2>Article 9. Modifications des prix et des conditions</h2>
                <p>
                    9.1 mycvmaking.com se réserve le droit de pouvoir modifier les présentes conditions et les prix, avec mise en vigueur au début de chaque nouvelle période 
                    de paiement, sauf dispositions contraires de la loi.
                </p>
                <p>
                    9.2. mycvmaking.com s’engage à annoncer les modifications ou les compléments sur le site internet, dans un délai minimal de trente jours précédant la date 
                    d’entrée en vigueur, afin que l’utilisateur/l’utilisatrice du service puisse en prendre connaissance dans un délai acceptable.
                </p>
                <p>
                    9.3. Au cas où l’utilisateur/l’utilisatrice du service n’accepterait pas la modification ou le complément, ce dernier/cette dernière aura la possibilité 
                    de résilier le présent accord jusqu’à la date de mise en vigueur de la modification ou du complément. L’utilisation du service après la date de mise en 
                    vigueur des modifications ou des compléments signifie l’acceptation formelle des conditions modifiées ou complémentaires par l’utilisateur/l’utilisatrice 
                    du service.
                </p>

                <br>

                <h2>Article 10. Dispositions diverses</h2>
                <p>
                    10.1. Dans les limites par ailleurs non prescrites par les règles de droit obligatoire, tout différend qui pourrait survenir dans le cadre du présent 
                    accord avec mycvmaking.com sera soumis à la juridiction néerlandaise compétente dans la circonscription dans laquelle mycvmaking.com a son siège.
                </p>
                <p>
                    10.2. Dans le cas où une disposition des présentes conditions d’utilisation exige qu’une communication doit être effectuée par écrit, la disposition 
                    sera jugée respectée au cas où la communication aurait été transmise par courriel ou par le biais de mycvmaking.com, à condition qu’il apparaisse clairement 
                    que le message provient de l’expéditeur même et que l’intégrité du message n’a pas été modifiée.
                </p>
                <p>
                    10.3. mycvmaking.com peut céder ses droits et obligations, prévus par le présent accord, de même que les données personnelles enregistrées et traitées 
                    lors de ses prestations de services, à un tiers acquérant mycvmaking.com ou ses opérations d'affaires.
                </p>

                <br>

                <h2>Article 10. Dispositions diverses</h2>
                <p>
                    L’utilisateur/l’ utilisatrice du service a la possibilité de prendre contact avec mycvmaking.com par le biais du formulaire de contact, pour toute 
                    question, suggestion ou remarque à propos des présentes conditions.
                </p>
        
            </div>
        </div>
    </div>
@endsection