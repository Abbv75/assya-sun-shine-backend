<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentationController extends Controller
{
    /**
     * @OA\Schema(
     *     schema="Role",
     *     type="object",
     *     title="Role",
     *     description="Role model",
     *     required={"id", "nom", "description"},
     *     @OA\Property(property="id", type="integer"),
     *     @OA\Property(property="nom", type="string"),
     *     @OA\Property(property="description", type="string"),
     * )
     * 
     * @OA\Schema(
     *     schema="User",
     *     type="object",
     *     title="User",
     *     description="User model",
     *     required={"id", "nomComplet", "login", "password", "telephone", "id_role"},
     *     @OA\Property(property="id", type="integer"),
     *     @OA\Property(property="nomComplet", type="string"),
     *     @OA\Property(property="login", type="string"),
     *     @OA\Property(property="password", type="string"),
     *     @OA\Property(property="telephone", type="string"),
     *     @OA\Property(property="adress", type="string"),
     *     @OA\Property(property="email", type="string"),
     *     @OA\Property(property="whatsapp", type="string"),
     *     @OA\Property(property="id_role", type="integer"),
     *     @OA\Property(property="role", ref="#/components/schemas/Role"),
     *     @OA\Property(property="contact", ref="#/components/schemas/Contact"),
     * )
     * 
     * @OA\Schema(
     *     schema="Contact",
     *     type="object",
     *     title="Contact",
     *     description="Contact model",
     *     required={"id", "telephone"},
     *     @OA\Property(property="id", type="integer"),
     *     @OA\Property(property="telephone", type="string"),
     *     @OA\Property(property="email", type="string"),
     *     @OA\Property(property="whatsapp", type="string"),
     *     @OA\Property(property="address", type="string"),
     * )
     * 
     * @OA\Schema(
     *     schema="TypeAbonnement",
     *     type="object",
     *     title="TypeAbonnement",
     *     description="TypeAbonnement model",
     *     required={"id", "nom", "prix"},
     *     @OA\Property(property="id", type="integer"),
     *     @OA\Property(property="nom", type="string"),
     *     @OA\Property(property="description", type="string"),
     *     @OA\Property(property="prix", type="number", format="float"),
     * )
     * 
     * @OA\Schema(
     *      schema="Boutique",
     *      type="object",
     *      title="Boutique",
     *      description="Boutique model",
     *      required={"id", "nom", "isPartenaire", "id_contact", "id_type_abonnement", "contact", "proprietaire"},
     *      @OA\Property(property="id", type="integer"),
     *      @OA\Property(property="nom", type="string"),
     *      @OA\Property(property="image", type="string"),
     *      @OA\Property(property="debutAbonnement", type="string", format="date-time"),
     *      @OA\Property(property="finAbonnement", type="string", format="date-time"),
     *      @OA\Property(property="isPartenaire", type="boolean"),
     *      @OA\Property(property="pourcentageProduit", type="number", format="float"),
     *      @OA\Property(property="id_contact", type="integer"),
     *      @OA\Property(property="id_type_abonnement", type="integer"),
     *      @OA\Property(property="contact", ref="#/components/schemas/Contact"),
     *      @OA\Property(property="type_abonnement", ref="#/components/schemas/TypeAbonnement"),
     *      @OA\Property(property="proprietaire", ref="#/components/schemas/User"),
     * )
     * 
     * @OA\Schema(
     *     schema="Categorie",
     *     type="object",
     *     title="Categorie",
     *     description="Categorie model",
     *     required={"id", "nom"},
     *     @OA\Property(property="id", type="integer"),
     *     @OA\Property(property="nom", type="string"),
     *     @OA\Property(property="description", type="string"),
     * )
     * 
     * @OA\Schema(
     *    schema="Produit",
     *    type="object",
     *    title="Produit",
     *    description="Produit model",
     *    required={"id", "nom", "prixAchat", "prixVenteDetails", "prixVenteEngros", "quantite"},
     *    @OA\Property(property="id", type="integer"),
     *    @OA\Property(property="nom", type="string"),
     *    @OA\Property(property="prixAchat", type="number", format="float"),
     *    @OA\Property(property="prixVenteDetails", type="number", format="float"),
     *    @OA\Property(property="prixVenteEngros", type="number", format="float"),
     *    @OA\Property(property="quantite", type="integer"),
     *    @OA\Property(property="id_categorie", type="integer"),
     *    @OA\Property(property="images", type="array", @OA\Items(ref="#/components/schemas/ProduitImage")),
     *    @OA\Property(property="categorie", ref="#/components/schemas/Categorie"),
     * )
     * 
     * @OA\Schema(
     *    schema="ProduitImage",
     *    type="object",
     *    title="ProduitImage",
     *    description="ProduitImage model",
     *    required={"id", "image", "id_produit"},
     *    @OA\Property(property="id", type="integer"),
     *    @OA\Property(property="image", type="string"),
     *    @OA\Property(property="id_produit", type="integer"),
     * )
     * 
     * @OA\Schema(
     *    schema="Client",
     *    type="object",
     *    title="Client",
     *    description="Client model",
     *    required={"id", "nomComplet", "id_contact"},
     *    @OA\Property(property="id", type="integer"),
     *    @OA\Property(property="nomComplet", type="string"),
     *    @OA\Property(property="id_contact", type="integer"),
     *    @OA\Property(property="contact", ref="#/components/schemas/Contact"),
     * )
     * 
     * @OA\Schema(
     *    schema="VenteProduit",
     *    type="object",
     *    title="VenteProduit",
     *    description="VenteProduit model",
     *    required={"id", "id_vente", "id_produit", "quantite", "montant"},
     *    @OA\Property(property="id", type="integer"),
     *    @OA\Property(property="id_vente", type="integer"),
     *    @OA\Property(property="id_produit", type="integer"),
     *    @OA\Property(property="quantite", type="integer"),
     *    @OA\Property(property="montant", type="number", format="float"),
     *    @OA\Property(property="produit", ref="#/components/schemas/Produit"),
     * )
     * 
     * @OA\Schema(
     *    schema="Vente",
     *    type="object",
     *    title="Vente",
     *    description="Vente model",
     *    required={"id", "montant", "id_boutique", "id_client"},
     *    @OA\Property(property="id", type="integer"),
     *    @OA\Property(property="montant", type="number", format="float"),
     *    @OA\Property(property="id_boutique", type="integer"),
     *    @OA\Property(property="id_client", type="integer"),
     *    @OA\Property(property="boutique", ref="#/components/schemas/Boutique"),
     *    @OA\Property(property="client", ref="#/components/schemas/Client"),
     *    @OA\Property(property="produits", type="array", @OA\Items(ref="#/components/schemas/Produit"))
     * )
     */
    public function schema() {}

    /**
     * @OA\Get(
     *     path="/api/roles",
     *     tags={"Roles"},
     *     summary="Get all roles",
     *     description="Get all roles",
     *     operationId="getAllRoles",
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(
     *              type="array",
     *              @OA\Items(ref="#/components/schemas/Role")
     *         )
     *     ),
     * )
     */
    public function roles() {}

    /** 
     * @OA\Get(
     *     path="/api/users",
     *     tags={"Users"},
     *     summary="recupérer tous les utilisateurs",
     *     description="Récupérer tous les utilisateurs avec leur contact et leur rôle",
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *            type="array",
     *            @OA\Items(ref="#/components/schemas/User")
     *         )
     *     )
     * )
     * 
     * @OA\Get(
     *     path="/api/users/{id}",
     *     tags={"Users"},
     *     summary="recupérer un utilisateur",
     *     description="Récupérer un utilisateur avec son contact et son rôle",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de l'utilisateur",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     )
     * )
     * 
     * @OA\Post(
     *     path="/api/users",
     *     tags={"Users"},
     *     summary="Créer un utilisateur",
     *     description="Créer un utilisateur avec son contact et son rôle",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 required={"nomComplet", "login", "password", "id_role", "telephone"},
     *                 @OA\Property(property="nomComplet", type="string"),
     *                 @OA\Property(property="login", type="string"),
     *                 @OA\Property(property="password", type="string"),
     *                 @OA\Property(property="id_role", type="integer"),
     *                 @OA\Property(property="telephone", type="string"),
     *                 @OA\Property(property="address", type="string"),
     *                 @OA\Property(property="email", type="string"),
     *                 @OA\Property(property="whatsapp", type="string")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Utilisateur créé avec succès",
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     )
     * )
     *
     * @OA\Put(
     *     path="/api/users/{id}",
     *     tags={"Users"},
     *     summary="Mettre à jour un utilisateur",
     *     description="Mettre à jour un utilisateur avec son contact et son rôle",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de l'utilisateur",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 @OA\Property(property="nomComplet", type="string"),
     *                 @OA\Property(property="login", type="string"),
     *                 @OA\Property(property="password", type="string"),
     *                 @OA\Property(property="telephone", type="string"),
     *                 @OA\Property(property="address", type="string"),
     *                 @OA\Property(property="email", type="string"),
     *                 @OA\Property(property="whatsapp", type="string")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Utilisateur mis à jour avec succès",
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     )
     * )
     *
     * @OA\Delete(
     *     path="/api/users/{id}",
     *     tags={"Users"},
     *     summary="Supprimer un utilisateur",
     *     description="Supprimer un utilisateur avec son contact",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de l'utilisateur",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Utilisateur supprimé avec succès"
     *     )
     * )
     *
     * @OA\Post(
     *     path="/api/users/login",
     *     tags={"Users"},
     *     summary="Connexion utilisateur",
     *     description="Connexion d'un utilisateur avec son login et mot de passe",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 required={"login", "password"},
     *                 @OA\Property(property="login", type="string"),
     *                 @OA\Property(property="password", type="string")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Utilisateur connecté avec succès",
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     )
     * )
     */
    public function users() {}

    /**
     * @OA\Get(
     *     path="/api/categorie",
     *     tags={"Categorie"},
     *     summary="recuperer tous les categories",
     *     description="Recuperer tous les types de categorie",
     *     operationId="getCategorie",
     *     @OA\Response(
     *         response=200,
     *         description="List of type categories",
     *         @OA\JsonContent(
     *               type="array",
     *               @OA\Items(ref="#/components/schemas/Categorie")
     *         )
     *     )
     * )
     * 
     * @OA\Delete(
     *     path="/api/categorie/{id}",
     *     tags={"Categorie"},
     *     summary="Suppresion dune categorie",
     *     description="Suppresion dune categorie",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la categorie",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Categorie supprimé avec succès"
     *     )
     * )
     * 
     * @OA\Post(
     *     path="/api/categorie",
     *     tags={"Categorie"},
     *     summary="Créer une categorie",
     *     description="Créer une categorie",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 required={"nom"},
     *                 @OA\Property(property="nom", type="string"),
     *                 @OA\Property(property="description", type="string")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Categorie cree avec succes",
     *         @OA\JsonContent(ref="#/components/schemas/Categorie")
     *     )
     * )
     *
     * @OA\Put(
     *     path="/api/categorie/{id}",
     *     tags={"Categorie"},
     *     summary="Modifie une categorie",
     *     description="Modifie une categorie",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la categorie",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 required={"nom"},
     *                 @OA\Property(property="nom", type="string"),
     *                 @OA\Property(property="description", type="string")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Categorie modifier avec succes",
     *         @OA\JsonContent(ref="#/components/schemas/Categorie")
     *     )
     * )
     */
    public function categorie() {}

    /**
     * @OA\Get(
     *     path="/api/produits",
     *     tags={"Produit"},
     *     summary="recuperer tous les produits",
     *     description="Recuperer tous les types de produit",
     *     operationId="getProduit",
     *    @OA\Response(
     *        response=200,
     *        description="List of type produits",
     *        @OA\JsonContent(
     *              type="array",
     *              @OA\Items(ref="#/components/schemas/Produit")
     *        )
     *    )
     * )
     * 
     * @OA\Get(
     *   path="/api/produits/{id}",
     *   tags={"Produit"},
     *   summary="recuperer un produit",
     *   description="Recuperer un produit",
     *   @OA\Parameter(
     *       name="id",
     *       in="path",
     *       required=true,
     *       description="ID du produit",
     *       @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *       response=200,
     *       description="Produit récupéré avec succès",
     *       @OA\JsonContent(ref="#/components/schemas/Produit")
     *   )
     * )
     * 
     * @OA\Post(
     *    path="/api/produits",
     *    tags={"Produit"},
     *    summary="Créer un produit",
     *    description="Créer un produit",
     *     @OA\RequestBody(
     *        required=true,
     *        @OA\MediaType(
     *           mediaType="multipart/form-data",
     *           @OA\Schema(
     *               required={"nom", "prixAchat", "prixVenteDetails", "prixVenteEngros", "quantite"},
     *               @OA\Property(property="nom", type="string"),
     *               @OA\Property(property="prixAchat", type="number", format="float"),
     *               @OA\Property(property="prixVenteDetails", type="number", format="float"),
     *               @OA\Property(property="prixVenteEngros", type="number", format="float"),
     *               @OA\Property(property="quantite", type="integer"),
     *               @OA\Property(property="id_categorie", type="integer"),
     *               @OA\Property(property="image", type="string", format="binary"),
     *               @OA\Property(property="description", type="string"),
     *           ),
     *        )
     *    ),
     *    @OA\Response(
     *          response=201,
     *          description="Produit créé avec succès",
     *          @OA\JsonContent(ref="#/components/schemas/Produit")
     *    )
     * )
     * 
     * @OA\Put(
     *      path="/api/produits/{id}",
     *      tags={"Produit"},
     *      summary="Modifier un produit",
     *      description="Modifier un produit",
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="ID du produit",
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\RequestBody(
     *           required=true,
     *           @OA\MediaType(
     *                mediaType="multipart/form-data",
     *                @OA\Schema(
     *                      @OA\Property(property="nom", type="string"),
     *                      @OA\Property(property="prixAchat", type="number", format="float"),
     *                      @OA\Property(property="prixVenteDetails", type="number", format="float"),
     *                      @OA\Property(property="prixVenteEngros", type="number", format="float"),
     *                      @OA\Property(property="quantite", type="integer"),
     *                      @OA\Property(property="id_categorie", type="integer"),
     *                      @OA\Property(property="image", type="string", format="binary"),
     *                      @OA\Property(property="description", type="string"),
     *                ),
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Produit modifié avec succès",
     *          @OA\JsonContent(ref="#/components/schemas/Produit")
     *      )
     * )
     * 
     * @OA\Delete(
     *     path="/api/produits/{id}",
     *     tags={"Produit"},
     *     summary="Supprimer un produit",
     *     description="Supprimer un produit",
     *     @OA\Parameter(
     *        name="id",
     *        in="path",
     *        required=true,
     *        description="ID du produit",
     *        @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *        response=200,
     *        description="Produit supprimé avec succès"
     *     )
     * )
     * 
     * @OA\Get(
     *    path="/api/produits/image/{name}",
     *    tags={"Produit"},
     *    summary="Recuperer l'image d'un produit",
     *    description="Recuperer l'image d'un produit",
     *    @OA\Parameter(
     *       name="name",
     *       in="path",
     *       required=true,
     *       description="nom de l'image du produit",
     *       @OA\Schema(type="string")
     *    ),
     *    @OA\Response(
     *       response=200,
     *       description="L'image a été récupérée avec succès",
     *       @OA\MediaType(
     *           mediaType="image/jpeg"
     *       )
     *    )
     * )
     * 
     * @OA\Delete(
     *    path="/api/produits/image/{id}",
     *    tags={"Produit"},
     *    summary="Supprimer une image d'un produit",
     *    description="Supprimer une image d'un produit ",
     *    @OA\Parameter(
     *        name="id",
     *        in="path",
     *        required=true,
     *        description="ID ou code du produit",
     *        @OA\Schema(type="string")
     *    ),
     *    @OA\RequestBody(
     *        required=true,
     *        @OA\MediaType(
     *            mediaType="application/json",
     *            @OA\Schema(
     *                @OA\Property(property="id", type="string", example="1"),
     *            )
     *        )
     *    ),
     *    @OA\Response(
     *        response=200,
     *        description="L'image a été supprimée avec succès"
     *    )
     * )
     * 
     * @OA\Post(
     *    path="/api/produits/image/{id}",
     *    tags={"Produit"},
     *    summary="Ajoute des images a un produit",
     *    description="Ajoute des images d'un produit ",
     *    @OA\Parameter(
     *        name="id",
     *        in="path",
     *        required=true,
     *        description="ID ou code du produit",
     *        @OA\Schema(type="string")
     *    ),
     *    @OA\RequestBody(
     *       required=true,
     *       @OA\MediaType(
     *          mediaType="multipart/form-data",
     *          @OA\Schema(
     *              @OA\Property(property="image", type="string", format="binary"),
     *          )
     *       )
     *    ),
     *    @OA\Response(
     *       response=200,
     *       description="L'image a été ajoutée avec succès",
     *    )
     * )
     */
    public function produit() {}

    /**
     * @OA\Get(
     *     path="/api/ventes",
     *     tags={"Vente"},
     *     summary="recuperer toutes les ventes",
     *     description="Recuperer tous les ventes d'une boutique",
     *     operationId="getAllVente",
     *     @OA\Response(
     *        response=200,
     *        description="List des ventes",
     *        @OA\JsonContent(
     *              type="array",
     *              @OA\Items(ref="#/components/schemas/Vente")
     *        )
     *     )
     * )
     * 
     * @OA\Get(
     *     path="/api/ventes/{id}",
     *     tags={"Vente"},
     *     summary="recuperer une vente",
     *     description="Recuperer une ventes d'une boutique avec les produits et le client",
     *     operationId="getVente",
     *     @OA\Parameter(
     *         name="currentboutique",
     *         in="header",
     *         required=true,
     *         description="ID ou code de la boutique courante",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="id de la vente",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *        response=200,
     *        description="la vente avec les produits",
     *        @OA\JsonContent(ref="#/components/schemas/Vente")
     *     )
     * ) 
     * 
     * @OA\Post(
     *     path="/api/ventes",
     *     tags={"Vente"},
     *     summary="Créer une nouvelle vente",
     *     description="Crée une nouvelle vente avec les informations du client et la liste des produits.",
     *     @OA\Parameter(
     *          name="currentboutique",
     *          in="header",
     *          required=true,
     *          description="ID de la boutique courante",
     *          @OA\Schema(type="string")
     *     ),
     *     @OA\RequestBody(
     *          required=true,
     *          description="Informations de la vente à créer",
     *          @OA\MediaType(
     *          mediaType="application/json",
     *          @OA\Schema(
     *              required={"client", "produitsList", "is_detail"},
     *              @OA\Property(
     *                  property="client",
     *                  type="object",
     *                  description="Informations sur le client",
     *                  required={"telephone", "nomComplet"},
     *                  @OA\Property(property="nomComplet", type="string", example="Younouss Bore"),
     *                  @OA\Property(property="telephone", type="string", example="70000001"),
     *                  @OA\Property(property="email", type="string", format="email", example="client@example.com"),
     *                  @OA\Property(property="adresse", type="string", example="Bamako, Mali"),
     *                  @OA\Property(property="whatsapp", type="string", example="70000001")
     *                  ),
     *                  @OA\Property(
     *                       property="produitsList",
     *                       type="array",
     *                       description="Liste des produits vendus",
     *                       @OA\Items(
     *                           type="object",
     *                           required={"id", "quantite"},
     *                           @OA\Property(property="id", type="integer", description="ID du produit"),
     *                           @OA\Property(property="quantite", type="integer", description="Quantité du produit"),
     *                           @OA\Property(property="montant", type="number", format="float", description="Prix de vente unitaire (optionnel, sinon calculé automatiquement)")
     *                       )
     *                  ),
     *                  @OA\Property(
     *                       property="is_detail",
     *                       type="boolean",
     *                       description="Indique si la vente est au détail (true) ou en gros (false). Impacte le calcul du prix si non fourni dans produitsList."
     *                  )
     *              )
     *          )
     *     ),
     *     @OA\Response(
     *          response=201,
     *          description="Vente créée avec succès",
     *          @OA\JsonContent(
     *              description="Retourne l'objet de la vente créée.",
     *              ref="#/components/schemas/Vente"
     *          )
     *     ),
     *     @OA\Response(
     *          response=422,
     *          description="Erreur de validation des champs",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Erreur de validation des champs"),
     *              @OA\Property(property="errors", type="object")
     *          )
     *     ),
     *     @OA\Response(
     *          response=500,
     *          description="Erreur interne du serveur",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Une erreur est survenue lors de la creation de la vente"),
     *              @OA\Property(property="error", type="string")
     *          )
     *     )
     * )
     * 
     * @OA\Delete(
     *      path="/api/ventes/{id}",
     *      tags={"Vente"},
     *      summary="Supprimer une vente",
     *      description="Supprime une vente spécifique en s'assurant qu'elle appartient à la boutique de l'utilisateur.",
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="ID numérique de la vente à supprimer.",
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Opération réussie",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Vente supprimer avec success")
     *          )
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Ressource non trouvée",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Vente introuvable")
     *          )
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Erreur interne du serveur",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Une erreur est survenue lors de la suppresion de la vente."),
     *              @OA\Property(property="error", type="string")
     *          )
     *      )
     * )
     */
    public function vente() {}
}
